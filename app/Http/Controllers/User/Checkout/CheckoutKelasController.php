<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Admin\Kelas;
use App\Models\Checkout;
use App\Models\DetailUserKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\AfterCheckout;
use Exception;
use Illuminate\Support\Str;
use Midtrans;
class CheckoutKelasController extends Controller
{

    public function __construct()
    {
      Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
      Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
      Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
      Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
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
    public function update(CheckoutRequest $request, $id)
    {

       $checkout = new Checkout;
       $checkout->card_number = $request->card_number;
       $checkout->cvc = $request->cvc;
       $checkout->expired = $request->expired;
       $checkout->tanggal = Carbon::today();
       $checkout->id_kelas = $id;
       $checkout->id = Auth::user()->id;
       $checkout->is_paid = 'Belum Lunas';
       $checkout->save();
       $this->getSnapRedirect($checkout);

       $user = Auth::user();
       $user->email = $request->email;
       $user->name = $request->name;
       $user->occupation = $request->occupation;
       $user->save();

       $detail = new DetailUserKelas;
       $detail->id = $checkout->id;
       $detail->id_kelas = $id;
       $detail->status_kelas = 'Waiting Payment';
       $detail->save();

        // Sending Email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));    

       return redirect()->route('checkout-success')->with('messageberhasil','Selamat Anda Berhasil Melakukan Checkout Kelas');
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

    public function success(){
        return view('success_checkout');
    }

    /**
     * Midtrans Handler
     */
    public function getSnapRedirect(Checkout $checkout)
    {
        $orderId = $checkout->id. '-' .Str::random(5);
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
            'name' => "Payment for {$checkout->Kelas->nama_kelas} Kelas",
            "category" => $checkout->Kelas->Jeniskelas->jenis_kelas,
        ];

        $userData = [
            'first_name' => $checkout->User->name,
            'last_name' => "",
            'address' => $checkout->User->address,
            'city' => "",
            'postal_code' => "",
            'phone' => $checkout->User->phone,
            'country_code' => "IDN"
        ];

        $customer_details = [
            'first_name' => $checkout->User->name,
            'last_name' => "",
            'email' => $checkout->User->email,
            'phone' => $checkout->User->phone,
            'billing_address' => $userData,
            'shipping_address' => $userData
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details
        ];

        try{
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            $checkout->save();

            return $paymentUrl;
        }catch (Exception $e){
            return false;
        }


    }
}
