<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        return view('admin.posts.add');
    }

    public function store(PostRequest $request)
    {
        //dd($request->all()); //Serve o mesmo que o print_r()
        $this->post->create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function del($id){
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

}
