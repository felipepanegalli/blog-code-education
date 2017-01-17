<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $post = \App\Post::all();

        return view('posts.index', compact('posts'));
    }
}
