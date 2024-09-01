<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulletine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'titulo', 'descripcion', 'ano', 'mes', 'url', 'image'
    ];
    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
