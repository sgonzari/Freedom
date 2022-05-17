<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = "bookmarks" ;

    protected $primaryKey = "id_bookmark" ;

    protected $fillable = [
        'fk_user',
        'fk_post'
    ] ;

    protected $hidden = [
        'id_bookmark'
    ] ;

    public function post () {
        return $this->belongsTo("App\Models\Post", "fk_post", "id_post") ;
    }
    public function user () {
        return $this->belongsTo("App\Models\User", "fk_user", "id_user") ;
    }
}
