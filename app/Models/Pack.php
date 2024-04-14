<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pack extends Model
{
    use HasFactory;
    public $fillable = ['nombre', 'descripcion', 'imagen', 'precio', 'user_id'];

    //relacion 1:n con user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
