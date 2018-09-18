<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();


        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->create($request->all());

        return response()->json([], 201);
    }
}
