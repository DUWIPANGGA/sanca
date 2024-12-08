<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = [
        'judul',
        'user_id',
        'content',
        'picture_article',
    ];
public $timestamps = true;
}
