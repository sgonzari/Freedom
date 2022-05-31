<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bug extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "bugs";

    protected $primaryKey = "id_bug";

    protected $fillable = [
        'fk_user',
        'text',
        'completed'
    ];

    protected $hidden = [
        'id_bug',
        'fk_completedBy'
    ];

    public function user () {
        return $this->belongsTo("App\Models\User", "fk_user", "id_user") ;
    }
    public function completedBy () {
        return $this->belongsTo("App\Models\User", "fk_completedBy", "id_user") ;
    }
}
