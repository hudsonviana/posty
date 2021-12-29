<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {

        // $posts = Post::get();
        $posts = Post::with(['user', 'likes'])->paginate(20); // with(['user', 'likes']) ==> Eager loading (para reduzir e nº de querys). 'user' e 'likes' são funções de relacionamento do model Post

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        // outras formas de criar esse método: 
            
        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);


        // Post::create([
        //     'user_id' => auth()->id,
        //     'body' => $request->body
        // ]);

        return back();
    }

    public function destroy(Post $post) {
        
        $post->delete();

        return back();
    }
}
