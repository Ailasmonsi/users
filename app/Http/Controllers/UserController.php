<?php

namespace App\Http\Controllers;

use App\Decorators\SkillDecorator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'regex:/^(\d{1,12}|[a-zA-Z]{1,12})$/'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $skills = ['php', 'js', 'golang', 'java'];
        $decoratedSkills = (new SkillDecorator($skills))->getDecoratedSkills();
        $description = implode(', ', $decoratedSkills);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $description,
        ]);

        return response()->json(['status' => 'User created', 'user' => $user]);
    }
}
