<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = "likes" ;

    protected $primaryKey = "id_like" ;

    public $timestamps = true ;

    protected $fillable = [
        'fk_user',
        'fk_post'
    ] ;

    protected $hidden = [
        'id_like'
    ] ;
}
