<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "warnings" ;

    protected $fillable = [
        'fk_admin',
        'fk_user',
        'reason',
        'opened'
    ] ;

    protected $hidden = [
        'id_warning'
    ] ;
}
