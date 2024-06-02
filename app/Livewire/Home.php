<?php

namespace App\Livewire;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public ?User $usuario = null;
    public $comentarios = [];

    public function render()
    {
        $this->usuario = auth()->user() ?? null;

        $posts = Post::orderby('id', 'desc')->paginate(5);

        $postslikes = ($this->usuario != null) ? $this->usuario->getArticlesLikesId() : [];

        return view('welcome', compact('posts', 'postslikes'));
    }

    public function like(Post $post)
    {
        $postsLike = $this->usuario->getArticlesLikesId() ?? [];
        if (($key = array_search($post->id, $postsLike)) !== false) {
            unset($postsLike[$key]);
        } else {
            $postsLike[] = $post->id;
        }
        $this->usuario->likeBy()->sync($postsLike);
    }

    public function escribirComent(Post $post)
    {
        $this->validate([
            'comentarios.' . $post->id => ['required', 'min:1'],
        ]);

        Comentario::create([
            'user_id' => $this->usuario->id,
            'post_id' => $post->id,
            'content' => $this->comentarios[$post->id],
        ]);

        $this->comentarios[$post->id] = '';
    }

    public function borrarComentario(Comentario $comentario)
    {
        $comentario->delete();
    }
}
