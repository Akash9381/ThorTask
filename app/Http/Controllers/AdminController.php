<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function AllUsers()
    {
        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'user');
            }
        )->orderby('id', 'desc')->Paginate(2);
        return view('admin.customer.active-customers', compact('users'));
    }

    public function EditUser($id = null)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return view('admin.customer.edit-customer', compact('user'));
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function UpdateUser(Request $request, $id = null)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|email',
            'password'          => 'required',
            'password_confirmation'  => 'required|same:password'
        ]);
        $user = User::where('id', $id)->first();
        if ($user) {
            try {
                User::where('id', $id)->update([
                    'name' => $request['name'],
                    'password' => Hash::make($request['password'])
                ]);
                return back()->with('success', 'User Data Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function DeleteUser($id=null){
        $user = User::where('id',$id)->first();
        if($user){
            User::where('id',$id)->delete();
            return back()->with('error','User deleted successfully');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}
