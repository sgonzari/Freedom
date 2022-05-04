<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications" ;

    protected $primaryKey = "id_notification" ;

    protected $fillable = [
        'fk_user',
        'fk_notifier',
        'fk_post',
        'fk_typeNot'
    ] ;

    protected $hidden = [
        'id_notification'
    ] ;

    public function post () {
        return $this->belongsTo("App\Models\Post", "fk_post", "id_post") ;
    }
    public function typeOf () {
        return $this->hasMany("App\Models\TypesNotification", "id_typeNot", "fk_typeNot") ;
    }
    public function user () {
        return $this->belongsTo("App\Models\User", "fk_user", "id_user") ;
    }
    public function notifier () {
        return $this->belongsTo("App\Models\User", "fk_notifier", "id_user") ;
    }
}
