<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\ParentQuestion;
use App\Process;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorys = Category::all();
        return view('category.index', compact('categorys'));

    }


    public function create()
    {
        $category= new Category();
        $processes= Process::all();
        return view('category.create', compact('category','processes'));
    }


    public function store(Request $request)
    {

        $process = Category::create($this->validateCategory());
        return redirect('category');

    }

    private function validateCategory()
    {
        return request()->validate([
            'process_id' => 'required',
            'category_name'=>'required',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        $processes = Process::all();
        return view('category.edit', compact('category','processes'));
    }

    public function update(Category $category)
    {
        $category->update($this->validateCategory());

        return redirect('category');
    }


    public function destroy(Category $category)
    {
        $category->delete();
//        $purposes=Purpose::all();
        return redirect('category');
    }
}
