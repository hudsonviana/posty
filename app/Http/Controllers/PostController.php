<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
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
}
