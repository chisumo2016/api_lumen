<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{

    //List all User
    public function  index()
    {
        $user = User::all();
        return response()->json($user);
    }

     //Create a New User
    public  function add(Request $request)
    {
        $request['api_token'] = str_random(60);
        $request['password']  = app('hash')->make($request['password']); // same bcrypt();
        $user = User::create($request->all());

        return response()->json($user);
    }

   //Updating /Edit the User
    public function edit(Request $request, $id)
    {
        $user= User::find($id);
        $user->update($request->all());

        return response()->json($user);

    }

    // View Post

    public function view($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    //Deleting the Post

    public function  delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('Removed Successfully');
    }
}
