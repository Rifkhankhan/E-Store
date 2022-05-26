<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;

use Validator;
use Auth;
use Hash;


class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->paginate(5);
    
        return view('employees.employees',compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employeename' => 'required',
            'employeeemail' => 'required',
            'employeegenter' => 'required',
            'employeeaddress' => 'required',
            'employeemobile' => 'required',
            'employeepassword' => 'required',
        ]);
        
        $employee=new Employee();
     
        $employee->name=$request->input('employeename');
        $employee->email=$request->input('employeeemail');
        $employee->genter=$request->input('employeegenter');
        $employee->address=$request->input('employeeaddress');
        $employee->mobileno=$request->input('employeemobile');
        $employee->password=$request->input('employeepassword');

        $employee->save();

        return redirect()->route('admin_employees')
                        ->with('stored','employee created successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('admin_employees')
                        ->with('stored','employee deleted successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employeename' => 'required',
            'employeeemail' => 'required',
            'employeegenter' => 'required',
            'employeeaddress' => 'required',
            'employeemobile' => 'required',
            'employeepassword' => 'required',
        ]);

        DB::table('employees')->where('id',$id)->update([
            'name'=>$request->employeename,
            "email"=>$request->employeeemail,
            "genter"=>$request->employeegenter,
            "address"=>$request->employeeaddress,  
            "mobileno"=>$request->employeemobile,
            "password"=>$request->employeepassword,
            
        ]);
       // $employee->update($request->all());
     
        return redirect()->route('admin_employees')
                        ->with('stored','employee updated successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('employees.create');
    }


    //Reset Password 
    public function reset_password($id)
    {
        $employee=Employee::where('id',$id)->first();

        return view('employees.reset_password',compact('employee'));
    }

    public function updatepassword(Request $request ,$id)
    {
        $employee=Employee::where('id',$id)->first();

        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required',
        ]);

        if($request->get('currentpassword')==$employee->password)
        {
            if($request->get('newpassword')==$request->get('confirmpassword'))
            {
                DB::table('employees')->where('id',$id)->update([
                    // "password"=>Hash::make($request->newpasword)
                    "password"=>$request->newpasword

                ]);

                return redirect()->route('reset_password',$employee->id)->with('success','Password Reset Successfully!');
            }
            else
            {
                return redirect()->route('reset_password',$employee->id)->with('success','New Password Is Not Same to Confirm Password');
            }
        }
       else
       {
           return redirect()->route('reset_password',$employee->id)->with('success','Your Current Passwor Is Incorrect');
       }
    }
   
}
