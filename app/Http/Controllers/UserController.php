<?php

namespace App\Http\Controllers;

use App\Decorators\Skills\GolangDeveloperDecorator;
use App\Decorators\Skills\JavaDeveloperDecorator;
use App\Decorators\Skills\JavaScriptDeveloperDecorator;
use App\Decorators\Skills\PHPDeveloperDecorator;
use App\Decorators\UserSkills;
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

        $skills = new UserSkills();

        $availableDecorators = [
            PHPDeveloperDecorator::class,
            JavaScriptDeveloperDecorator::class,
            GolangDeveloperDecorator::class,
            JavaDeveloperDecorator::class,
        ];

        shuffle($availableDecorators);
        $decoratorsToApply = array_slice($availableDecorators, 0, rand(1, count($availableDecorators)));

        foreach ($decoratorsToApply as $decorator) {
            $skills = new $decorator($skills);
        }

        $description = $skills->getSkills();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $description,
        ]);

        return response()->json(['status' => 'User created', 'user' => $user]);
    }
}
