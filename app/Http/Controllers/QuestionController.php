<?php

namespace App\Http\Controllers;


use App\ParentQuestion;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        $parent_question = ParentQuestion::all();
        return view('question.create',compact('parent_question'));
    }

    public function index()
    {
        $questions = Question::all();

        return view('question.index', compact('questions'));

    }



    public function create()
    {
        $parent_questions = ParentQuestion::all();
        $question = new Question();
        return view('question.create',compact('question','parent_questions'));
    }


    public function store( )
    {


        $question= Question::create($this->validateQuestion());

        return redirect('question');
    }
    private function validateQuestion()
    {
        return request()->validate([
            'question_name' => 'required',
            'question_score' => 'required',
            'parent_question_id' => 'required',


        ]);
    }



    public function show($id)
    {
        //
    }


    public function edit(Question $question)
    {
        $parent_questions = ParentQuestion::all();
        return view('question.edit', compact('question','parent_questions'));
    }


    public function update(Question $question)
    {
        $question->update($this->validateQuestion());

        return redirect('question');
    }


    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('question');
    }
}
