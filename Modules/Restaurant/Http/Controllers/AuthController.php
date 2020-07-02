<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function login(){

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('restaurant/orders');
        }else{
            return redirect()->back()->withErrors("nik atau password salah");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
