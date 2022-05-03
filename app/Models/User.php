<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = "users" ;

    protected $primaryKey = "id_user" ;

    protected $fillable = [
        'name', 
        'username',
        'email',
        'password',
        'description'
    ] ;

    protected $hidden = [
        'id_user',
        'email',
        'password',
    ] ;

    public function rol () {
        return $this->hasMany("App\Models\Rol", "id_rol", "fk_rol") ;
    }

    public function posts () {
        return $this->belongsTo("App\Models\Post", "id_user", "fk_user") ;
    }
    public function likes () {
        return $this->belongsToMany("App\Models\Post", "likes", "fk_user", "fk_post") ;
    }
    public function reposts () {
        return $this->belongsToMany("App\Models\Post", "reposts", "fk_user", "fk_post") ;
    }
    public function bookmarks () {
        return $this->belongsToMany("App\Models\Post", "bookmarks", "fk_user", "fk_post") ;
    }

    public function followers () {
        return $this->belongsToMany("App\Models\User", "follows", "fk_follow", "fk_user") ;
    }
    public function followings () {
        return $this->belongsToMany("App\Models\User", "follows", "fk_user", "fk_follow") ;
    }

    public function notifications () {
        return $this->hasMany("App\Models\Notification", "fk_notifier", "id_user") ;
    }
}
