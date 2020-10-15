<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model
{
    protected $fillable = [
        'question', 'answer', 'type','course_id',
    ];

    public function courseConnect(){
        return $this->belongsTo('App\Course');
    }

    public function optionConnect(){
        return $this->hasMany('App\Option');
    }

    public function getId($id){
        $result=MultipleChoice::where('id',$id)->first;
        $id=$result->id;
        return $id;
    }
}
