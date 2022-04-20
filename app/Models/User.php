<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function rol() {
        return $this->hasMany("App\Models\Rol", "id_rol", "fk_rol") ;
    }
}
