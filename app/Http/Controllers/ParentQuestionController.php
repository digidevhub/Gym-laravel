<?php

namespace App\Http\Controllers;

use App\ParentQuestion;

use App\Process;
use App\Purpose;
use Illuminate\Http\Request;

class ParentQuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $parent_questions = ParentQuestion::all();
        return view('parent_question.index', compact('parent_questions'));
        //return view('parent_question.index');
    }


    public function create()
    {
        $parent_question= new ParentQuestion();
        $processes = Process::all();
        return view('parent_question.create', compact('parent_question','processes'));
    }


    public function store( )
    {

        $parent_question = ParentQuestion::create($this->validateParent());
        return redirect('parent_question');

    }

    private function validateParent()
    {
        return request()->validate([
            'pq_name' => 'required',
            'process_id'=>'required',
        ]);
    }
    public function show($id)
    {

    }


    public function edit(ParentQuestion $parent_question)
    {
        $processes = Process::all();
        return view('parent_question.edit', compact('parent_question','processes'));
    }


    public function update(ParentQuestion $parent_question)
    {
        $parent_question->update($this->validateParent());

        return redirect('parent_question');
    }


    public function destroy(ParentQuestion $parent_question)
    {
        $parent_question->delete();
//        $purposes=Purpose::all();
        return redirect('parent_question');
    }
}
