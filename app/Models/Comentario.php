<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'user_id', 'post_id'];

    //relacion 1:n con user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //relacion 1:n con post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
