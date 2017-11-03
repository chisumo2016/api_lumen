<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only'=>['add', 'view']]);
    }

    //List all post
    public function  index()
    {
        $post = Post::all();
        return response()->json($post);
    }

     //Create a New Post
    public  function createPost(Request $request)
    {
        $post = Post::create($request->all());
         return response()->json($post);
    }

   //Updating the Post
    public function updatePost(Request $request, $id)
    {
        $post= Post::find($id);
        $post->title  = $request->input('title');
        $post->body  = $request->input('body');
        $post->views  = $request->input('view');

        $post->save();

        return response()->json($post);

    }

    // View Post

    public function viewPost($id)
    {
        $post = Post::find($id);

        return response()->json($post);
    }

    //Deleting the Post

    public function  deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Removed Successfully');
    }
}
