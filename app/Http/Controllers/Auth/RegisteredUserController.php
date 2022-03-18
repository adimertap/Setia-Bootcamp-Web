<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerusahaanAkunRequest;
use App\Models\Perusahaan\ProfilePerusahaan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(PerusahaanAkunRequest $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);


        $user = new User;
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'Perusahaan';
        $user->occupation = 'Perusahaan Kerjasama';
        $user->email_verified_at = Carbon::now();
        $user->save();

        event(new Registered($user));

        Auth::login($user); 

        if(ProfilePerusahaan::where('id', Auth::user()->id)->exists()){
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect(route('profile-perusahaan.create'));
        }

       

        
        
    }
}
