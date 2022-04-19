<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts" ;

    protected $primaryKey = "id_post" ;

    protected $fillable = [
        'fk_user',
        'fk_post',
        'content',
        'images'
    ] ;

    protected $hidden = [
        'id_post',
        'fk_post',
        'fk_user',
    ] ;
}
