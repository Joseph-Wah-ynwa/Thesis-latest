<?php

namespace App\Http\Controllers;

use App\Video;
use App\Course;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //video detail
    public function detail($id){
        $result=Video::find($id);
        
        
        return view('teacher.video.detail')->with('details',$result);
    }

    //update video
    public function Update(Request $request){

        $file=$request->file('video');
        $fileName=uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path().'/videos/',$fileName);
        $data=[
        
            
            'title'=>$request->name,
            'video'=>$fileName,
            'course_id'=>$request->course_id
            
        ];
        $id=$request->video_id;
        Video::find($id)->update($data);
        
        return back()->with('success','Video Update Success !');
    }
}
