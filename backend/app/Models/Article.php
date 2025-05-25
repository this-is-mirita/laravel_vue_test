<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'text',
        'preview_image',
        'owner_id',
    ];

}
