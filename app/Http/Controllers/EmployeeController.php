<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function EmployeeForm()
    {
        $companies = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'company');
            }
        )->orderby('id', 'desc')->get();
        return view('admin.employee.add-employee', compact('companies'));
    }

    public function CreateEmployee(Request $request)
    {
        $this->validate($request, [
            'company_id'                => 'required',
            'name'                      => 'required',
            'email'                     => 'required|email|unique:users',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password'
        ]);
        try {
            $employee           = new User();
            $employee->name     = $request['name'];
            $employee->email    = $request['email'];
            $employee->password = Hash::make($request['password']);
            $employee->save();
            $employee->assignRole('user');

            $emp                = new Employee();
            $emp->company_id    = $request['company_id'];
            $emp->employee_id   = $employee->id;
            $emp->name          = $request['name'];
            $emp->email         = $request['email'];
            $emp->save();
            return back()->with('success', 'Employee Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function Employees()
    {
        $employees = Employee::with('Company')->orderby('id', 'desc')->Paginate(10);
        return view('admin.employee.employees', compact('employees'));
    }

    public function EditEmployee($id = null)
    {
        $companies = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'company');
            }
        )->orderby('id', 'desc')->get();
        $employee = Employee::where('id', $id)->first();
        return view('admin.employee.edit-employee', compact('employee', 'companies'));
    }

    public function UpdateEmployee(Request $request, $id = null)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            'company_id'    => 'required',
        ]);
        $employee = Employee::where('id', $id)->first();
        if ($employee) {
            Employee::where('id', $id)->update([
                'name' => $request['name'],
                'company_id' => $request['company_id']
            ]);
            User::where('id', $employee['employee_id'])->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
            ]);
            return back()->with('success', 'Employee Updated Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function DeleteEmployee($id=null){
        Employee::where('employee_id',$id)->delete();
        User::where('id',$id)->delete();
        return back()->with('error', 'Employee Deleted Successfully');
    }
}
