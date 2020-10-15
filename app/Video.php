<?php

namespace App;

use App\Video;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'video', 'course_id',
    ];

    public function courseConnect(){
        return $this->belongsTo('App\Course','course_id');
    }

    public function retreiveByCourse($id){
        $result=Video::where('course_id',$id)->get();
        return $result;
    }
}
