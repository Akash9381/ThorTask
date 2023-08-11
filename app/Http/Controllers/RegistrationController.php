<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function ChangeLanguage(Request $request, $lg = null)
    {
        App::setlocale($request->lg);
        session()->put('locale', $request->lg);
        return view('registration');
    }
    public function Form()
    {
        return view('registration');
    }

    public function Registration(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'password_confirmation'  => 'required|same:password'
        ]);
        $data  = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        try {
            $user  = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->save();
            $user->assignRole('user');
            // Mail::to('appmail')->send(new RegistrationMail($data));
            return back()->with('success', 'Your registration Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function AdminRegistration(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'password_confirmation'  => 'required|same:password'
        ]);
        $data  = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        try {
            $user  = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->save();
            $user->assignRole('user');
            // Mail::to('appmail')->send(new RegistrationMail($data));
            return back()->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
