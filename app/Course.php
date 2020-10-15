<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    protected $fillable = [
        'name','description', 'start_date', 'end_date','user_id',
    ];
    

    public function addCourse($course_name,$user_id){
        $course=new Course;
        // dd($course_name);
    	$course->name=$course_name;
        $course->user_id=$user_id;
        $course->save();
    	// echo "Success";
    }	

    public function userConnect(){
        return $this->belongsTo('App\User','user_id');
    }

    public function videoConnect(){
        return $this->hasMany('App\Video','course_id');
    }

    public function multipleChoiceConnect(){
        return $this->hasMany('App\MultipleChoice');
    }

    public function assignmentConnect(){
        return $this->hasMany('App\Assignment');
    }



    public function retreive(){
    	$result=Course::orderBy('id','desc')->get();
        return $result;
    }
    // course of unique user
    public function retreiveDetails($id){
        $result=Course::where('user_id',$id)->orderBy('id','desc')->get();
        return $result;
    }
    //only one course
    public function retreiveCourse($id){
        $result=Course::where('id',$id)->first();
        return $result;
    }
}
