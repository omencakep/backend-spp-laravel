<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function halamanLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('/');
    }
}
