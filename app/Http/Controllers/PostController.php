<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function show(){
        $post = Post::all();

        return response()->json($post);
    }
    public function destroy(Request $request){
        $post = Post::findOrFail($request->id);
        return response()->json(['message'=>'This post has been deleted successfully']);
    }
    public function createpost(){
        $post = new Post;
        

    }
}

