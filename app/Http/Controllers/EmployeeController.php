<?php

namespace App\Http\Controllers;

use App\Employee;
use App\ParentQuestion;
use App\Process;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));



    }


    public function create()
    {
        $tl_list=DB::table('users')
            ->where('user_type','TL')->get();
        $qa_list=DB::table('users')
            ->where('user_type','QA')->get();

        $processes= Process::all();
        $employee = new Employee();
        return view('employee.create',compact('processes','qa_list','tl_list','employee'));

    }


    public function store(Request $request)
    {
        $employees = Employee::create($this->validateEmployee());
        return redirect('employee');
    }

    private function validateEmployee()
    {
        return request()->validate([
            'emp_id' => 'required',
            'employee_name' => 'required',
            'tl_id' => 'required',
            'qa_id' => 'required',
            'process_id'=>'required',
        ]);
    }
    public function show($id)
    {

    }


    public function edit(Employee $employee)
    {
        $tl_list=DB::table('users')
            ->where('user_type','TL')->get();
        $qa_list=DB::table('users')
            ->where('user_type','QA')->get();
        $processes= Process::all();
        return view('employee.edit',compact('employee','processes','qa_list','tl_list'));
        //return view('employee.edit', compact('employee'));
    }


    public function update(Employee $employee)
    {
        $employee->update($this->validateEmployee());

        return redirect('employee');

    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
//
        return redirect('employee');

    }
}
