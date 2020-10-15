<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'title', 'description', 'assignment','course_id',
    ];
    
    public function courseConnect(){
        return $this->belongsTo('App\Course','course_id');
    }
}
