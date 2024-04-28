<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        //dd($post->id);
        return view('show.show', compact('post'));
    }
}
