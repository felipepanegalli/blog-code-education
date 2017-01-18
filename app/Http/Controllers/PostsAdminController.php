<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

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
        $tags = array_filter(array_map('trim', explode(',', $request->tags)));
        $tagsIDs = [];
        foreach ($tags as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        $post = $this->post->create($request->all());
        $post->tags()->sync($tagsIDs);
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $tags = array_filter(array_map('trim', explode(',', $request->tags)));
        $tagsIDs = [];
        foreach ($tags as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($tagsIDs);
        return redirect()->route('admin.posts.index');
    }

    public function del($id){
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach ($tagList as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        return $tags;
    }

}
