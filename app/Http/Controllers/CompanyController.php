<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function Store(Request $request)
    {

        $user = User::where('email', $request['email'])->first();
        if ($user) {
            return response()->json(['error' => 'Email Already Exist!', 'status' => 0]);
        } else {
            try {
                $company = new User();
                $company['name'] = $request['name'];
                $company['email'] = $request['email'];
                $company['password'] = Hash::make($request['password']);
                $company->save();
                $company->assignRole('company');
                return response()->json(['success' => 'Company Inserted Successfully', 'status' => 1]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage(), 'status' => 0]);
            }
        }
    }

    public function Companies()
    {
        $companies = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'company');
            }
        )->with('CompanyEmployee')->orderby('id', 'desc')->Paginate(10);
        return view('admin.company.companies', compact('companies'));
    }

    public function EditCompany($id = null)
    {
        $company = User::where('id', $id)->first();
        return view('admin.company.edit-company', compact('company'));
    }

    public function UpdateCompany(Request $request, $id = null)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            User::where('id', $id)->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
            ]);
            return back()->with('success', 'Data Updated Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function DeleteCompany($id = null)
    {
        Employee::where('company_id',$id)->delete();
        User::where('id',$id)->delete();
        return back()->with('error','Company Deleted Successfully');
    }
}
