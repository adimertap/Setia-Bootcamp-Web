<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan\ProfilePerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        if(Auth::user()->role == 'User'){
            return redirect(route('user.dashboard'));
        }else if(Auth::user()->role == 'Admin'){
            return redirect(route('admin.dashboard'));
        }else if(Auth::user()->role == 'Mentor'){
            return redirect(route('mentor.dashboard'));
        }else if(Auth::user()->role == 'Perusahaan'){
            if(ProfilePerusahaan::where('id', Auth::user()->id)->exists()){
                return redirect(route('perusahaan.dashboard'));
            }else{
                return redirect(route('profile-perusahaan.create'));
            }
        }

        // switch(Auth::user()->role == 'User'){
        //     case true:
        //         return redirect(route('admin.dashboard'));
        //         break;
            
        //     default:
        //     return redirect(route('user.dashboard'));
        //         break;
        // }
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
    public function show($id)
    {
        //
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
        //
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
}
