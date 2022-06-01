<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    use HasFactory;

    protected $table = "reposts" ;

    protected $primaryKey = "id_repost" ;

    public $timestamps = true ;

    protected $fillable = [
        'fk_user',
        'fk_post'
    ] ;

    protected $hidden = [
        'id_repost'
    ] ;

    public function user () {
        return $this->hasMany("App\Models\User", "id_user", "fk_user") ;
    }
}
