<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = "reports";

    protected $primaryKey = "id_report";

    protected $fillable = [
        'fk_user',
        'fk_post',
        'reason',
        'completed'
    ];

    protected $hidden = [
        'id_report',
        'fk_completedBy'
    ];

    public function user () {
        return $this->belongsTo("App\Models\User", "fk_user", "id_user") ;
    }
    public function post () {
        return $this->belongsTo("App\Models\Post", "fk_post", "id_post") ;
    }
    public function completedBy () {
        return $this->belongsTo("App\Models\User", "fk_completedBy", "id_user") ;
    }
}
