<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(){
        //$posts = Post::all();
        $posts = $this->post->paginate(6);
        return view('posts.index', compact('posts'));
    }
}
