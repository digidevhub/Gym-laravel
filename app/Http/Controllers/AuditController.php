<?php

namespace App\Http\Controllers;

use App\Audit;
use App\BasicResponse;
use App\Category;
use App\Employee;
use App\ParentQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $audits = Audit::all();
        return view('audit.index');

    }


    public function create()
    {
        $employees = Employee::all();
        $categories = Category::all();
        $user=Auth::user();
        $parents=DB::table('parent_questions')->where('process_id',$user->process_id)->get();
        return view('audit.create',compact('employees','categories','user','parents'));
    }


    public function store(Request $request)
    {
        request()['contact_date'] = date("Y-m-d", strtotime(request('contact_date')));
        request()['evaluation_date'] = date("Y-m-d", strtotime(request('evaluation_date')));
        $basic_response = BasicResponse::create($this->validateBasic());
        dd($basic_response);
        $response = Response::create($this->validateResponse());
        return redirect('audit',compact('basic_response','response'));
    }
    private function validateBasic()
    {
        return request()->validate([
            'employee_id' => 'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'contact_date'=>'required',
            'evaluation_date'=>'required',
            'msisdn'=>'required',
            'week'=>'required',
            'accurate_wrap'=>'required',
            'wrong_wrap'=>'required',
            'remarks'=>'required',
            'tenure'=>'required',
        ]);
    }
    private function validateResponse()
    {
        return request()->validate([
            'basic_response_id' => 'required',
            'question_id'=>'required',
            'response'=>'required',

        ]);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
