<?php

namespace App\Http\Controllers;


use App\Process;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProcessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();
        return view('process.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $process= new Process();
        //toast('Your Post as been submited!','success');
       // alert()->error('Title','Lorem Lorem Lorem');
        return view('process.create', compact('process'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($process = Process::create($this->validateProcess())){
            toast('Your Process is Created Successfully ','success');
        }
        else{
            toast('Please Try again ','error');
        }


        return redirect('process');

    }
    private function validateProcess()
    {
        return request()->validate(['pr_name' => 'required']);
    }


    public function show($id)
    {

    }


    public function edit(Process $process)
    {
        return view('process.edit', compact('process'));
    }

    public function update(Process $process)
    {
        $process->update($this->validateProcess());

        return redirect('process');
    }


    public function destroy($id)
    {

    }
}
