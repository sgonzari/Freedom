<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesNotification extends Model
{
    use HasFactory;

    protected $table = "types-notifications" ;

    protected $primaryKey = "id_typeNot" ;

    public $timestamps = false ;

    public function notifications () {
        return $this->belongsTo("App\Models\Notifications", "id_typeNot", "fk_typeNot") ;
    }
}
