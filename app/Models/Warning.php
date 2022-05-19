<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "warnings" ;

    protected $primaryKey = "id_warning" ;

    protected $fillable = [
        'fk_admin',
        'fk_user',
        'reason',
        'opened'
    ] ;

    protected $hidden = [
        'id_warning'
    ] ;

    public function user () {
        return $this->belongsTo("App\Models\User", "fk_user", "id_user") ;
    }
    public function reportedBy () {
        return $this->belongsTo("App\Models\User", "fk_admin", "id_user") ;
    }
}
