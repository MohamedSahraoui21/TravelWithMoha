<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['titulo', 'contenido', 'imagen', 'user_id'];

    //relacion 1:n con user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
