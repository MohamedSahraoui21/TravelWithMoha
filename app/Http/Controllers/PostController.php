<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', '=', auth()->user()->id)->orderby('id', 'desc')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'unique:posts,titulo'],
            'contenido' => ['required', 'string', 'min:3', 'unique:posts,titulo'],
            'imagen' => ['nullable', 'image', 'max:2048'],

        ]);
        Post::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => ($request->imagen) ? $request->imagen->store('posts') : "default.png",
            'user_id' => auth()->user()->id,

        ]);
        return redirect()->route('posts.index')->with('mensaje', 'Producto Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:3', 'unique:posts,titulo' . $post->id],
            'contenido' => ['required', 'string', 'min:3', 'unique:posts,titulo'],
            'imagen' => ['nullable', 'image', 'max:2048'],

        ]);
        $ruta = $post->imagen;
        if ($request->imagen) {
            if (basename($post->imagen) != 'default.png') {
                Storage::delete($post->imagen);
            }
            $ruta = $request->imagen->store('posts');
        }
        $post->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $ruta,
            'user_id' => auth()->user()->id,

        ]);
        return redirect()->route('posts.index')->with('mensaje', 'Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (basename($post->imagen) != 'default.png') {
            Storage::delete($post->imagen);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje', 'Post Borrado');
    }
}
