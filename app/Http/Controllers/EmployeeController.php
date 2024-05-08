<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::all();
        return view('Employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        $data=$request->validated();

        $employee=new Employee;

        $employee->emp_name=$data['empname'];
        $employee->emp_address=$data['empadd'];
        $employee->emp_age=$data['empage'];

        $employee->save();

        return redirect(route('employee.index'))->with('status','Employee Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($employee_id)
    {
        $employee=Employee::find($employee_id);
        return view('Employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request,$employee_id)
    {
        $data=$request->validated();

        $employee=Employee::find($employee_id);

        $employee->emp_name=$data['empname'];
        $employee->emp_address=$data['empadd'];
        $employee->emp_age=$data['empage'];

        $employee->update();

        return redirect(route('employee.index'))->with('status','Employee Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($employee_id)
    {
        $employee=Employee::find($employee_id);

        $employee->delete();

        return redirect(route('employee.index'))->with('status','Employee Deleted Successfully!'); 
    }
}
