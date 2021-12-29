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
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20); 
        
        // with(['user', 'likes']) ==> Eager loading (para reduzir e nº de querys). 'user' e 'likes' são funções de relacionamento do model Post

        // o orderBy('created_at', 'desc') pode ser substituído por latest() 

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
        
        /* essa instrução deve ser colocada no controller para que ninguém que não seja o autor do post consiga executá-la, mesmo modificando o caminho do action do formulário no html 
        if (!$post->ownedBy(auth()->user())) {
            // dd('Não');
            return redirect('https://markhjorth.github.io/nedry/');
        }
        */

        $this->authorize('delete', $post); // a função 'delete' está no PostPolicy

        $post->delete();

        return back();
    }
}
