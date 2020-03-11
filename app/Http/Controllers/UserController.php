<?php

namespace App\Http\Controllers;

use App\ParentQuestion;
use App\Process;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));

    }


    public function create()
    {

        $processes = Process::all();
        $user= new User();

        return view('user.create', compact('processes','user'));
    }


    public function store(Request $request)
    {
        request()['password']=Hash::make($request->getPassword());
        $user = User::create($this->validateUser());
        return redirect('user');
    }
    private function validateUser()
    {
        return request()->validate([

            'employee_id' => 'required',
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'process_id' => 'required',


        ]);
    }


    public function show($id)
    {

    }


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }


    public function update(User $user)
    {
        $user->update($this->validateUser());

        return redirect('user');
    }


    public function destroy(User $user)
    {
        $user->delete();
//
        return redirect('user');
    }
}
