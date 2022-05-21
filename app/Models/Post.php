<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

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

    public function user () {
        return $this->hasMany("App\Models\User", "id_user", "fk_user") ;
    }

    public function likes () {
        return $this->belongsToMany("App\Models\User", "likes", "fk_post", "fk_user") ;

    }
    public function reposts () {
        return $this->belongsToMany("App\Models\User", "reposts", "fk_post", "fk_user") ;
    }
    public function comments () {
        return $this->belongsTo("App\Models\Post", "id_post", "fk_post") ;
    }
    public function reports () {
        return $this->belongsTo("App\Models\Report", 'id_post', 'fk_post') ;
    }
}
