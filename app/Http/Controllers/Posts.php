<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Posts extends Controller
{

    public function index()
    {
        $posts = Post::all();
        /* dd($posts); */

        return view('posts.index', [ //спец метод где возврощаем из нужной директории вюшку и передаем 2-ым аргументом ассоц массив для шаблона
            'posts'=> $posts,
        ]);
    }

   
    public function create()
    {
        return view('posts.create');
    }

    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5|max:1000'
        ]);

        $post = Post::create($validated);
        return redirect("/posts/{$post->id}"); //без именного роутинга
    }

    public function show(string $id)
    {
     $post = Post::findOrFail($id); 
     return view('posts.show', [
        'post'=>$post
     ]);
    }

    
    public function edit($id)
    {
     $post = Post::findOrFail($id); 
     return view('posts.edit', compact('post'));
    }

   
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id); 

        $validated = $request->validate([
        'title' => 'required|min:5|max:255',
        'content' => 'required|min:5|max:1000'
        ]);

        $post->update($validated);
        
        return redirect()->route('posts.showAll', [$post->id]);
    }

    
    public function destroy($id)
    {
        //
    }
}
