<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public  function createPost(Request $request)
    {
        $post = Post::create($request->all());
         return response()->json($post);
    }


    public function updatePost(Request $request, $id)
    {
        $post= Post::find($id);
    }
}
