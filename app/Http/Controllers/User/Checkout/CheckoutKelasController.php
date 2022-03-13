<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Admin\Kelas;
use App\Models\Checkout;
use App\Models\DetailUserKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\Checkout\AfterCheckout;
use Illuminate\Support\Facades\Auth;
use Mail;
use Str;
use Midtrans;
use Exception;

class CheckoutKelasController extends Controller
{

    public function __construct()
    {
        // Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Midtrans\Config::$serverKey = "SB-Mid-server-ThmSXotcqD9A6m7KSd-SIaEG";
        Midtrans\Config::$isProduction = false;
        Midtrans\Config::$isSanitized = false;
        Midtrans\Config::$is3ds = false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.checkout.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        
        $detail = DetailUserKelas::with('Kelas')->where('id', Auth::user()->id)->where('id_kelas','=',$id)->exists();
        $kelas = Kelas::with('Jeniskelas','Level','Detailkeypoint','Detailvideo','DetailMentor.User')->find($id);

        if ($detail != null){
            $request->session()->flash('error', "You already registered on {$kelas->nama_kelas} Class.");
            return redirect()->route('kelas-saya.index');
        }

        
        return view('user.checkout.checkout',compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $user = Auth::user();
       $user->email = $request->email;
       $user->name = $request->name;
       $user->occupation = $request->occupation;
       $user->phone = $request->phone;
       $user->address = $request->address;
       $user->save();

       $checkout = Checkout::create([
            'id_kelas' => $id,
            'id' => Auth::user()->id
        ]);

       $this->getSnapRedirect($checkout);
   

        // Sending Email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));    
    //    return redirect()->route('checkout-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success()
    {
        return view('user.checkout.status.success_checkout');
    }

    /**
     * Midtrans Handler
     */
    public function getSnapRedirect(Checkout $checkout)
    {
        $orderId = $checkout->id_checkouts. '-' .Str::random(5);
        $checkout->midtrans_booking_code = $orderId;
        $price = $checkout->Kelas->harga_kelas;

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $price
        ];

        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => 1,
            'name' => "Payment for Class",
            'category' => $checkout->Kelas->Jeniskelas->jenis_kelas,
        ];

        $userData = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "address" => $checkout->User->address,
            "city" => "",
            "postal_code" => "",
            "phone" => $checkout->User->phone,
            "country_code" => "IDN"
        ];

        $customer_details = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone,
            "billing_address" => $userData,
            "shipping_address" => $userData
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];

        try{
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            $checkout->total_price = $price;
            $checkout->save();
            return redirect()->to($paymentUrl)->send();
            // header('Location: '.$paymentUrl);
            // return $paymentUrl;

        }catch (Exception $e){
            dd($e);
        }
    }

    public function midtransCallback (Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('-', $notif->order_id)[0];
        $checkout = Checkout::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'challenge'
            $checkout->payment_status = 'Pending';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'success'
            $checkout->payment_status = 'Paid';

            $detail = new DetailUserKelas;
            $detail->id = $checkout->id;
            $detail->id_kelas = $checkout->id_kelas;
            $detail->status_kelas = 'Progress';
            $detail->save();
            $checkout->save();

            return view('user.checkout.status.success_checkout');
        }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'Failed';
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'Failed';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'Failed';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'Paid';

            $detail = new DetailUserKelas;
            $detail->id = $checkout->id;
            $detail->id_kelas = $checkout->id_kelas;
            $detail->status_kelas = 'Progress';
            $detail->save();
            $checkout->save();

            return view('user.checkout.status.success_checkout');
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'Pending';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'Failed';
        }

      
       
    }
}
