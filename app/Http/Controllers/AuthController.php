<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Home(){
        Auth::logout();
        return redirect(route('login'));
    }
    public function Authenticate(Request $request){
        $this->validate($request,[
            'email'=> 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            $request->session()->regenerate();
            if(Auth::user()->hasRole('admin')){
                return redirect('admin/dashboard');
            }else{
                return redirect('/home');
            }
        }else{
            return back()->with('error', 'Whoops! Invalid Email or Password.');
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
