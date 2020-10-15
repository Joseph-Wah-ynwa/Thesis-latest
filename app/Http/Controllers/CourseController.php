<?php

namespace App\Http\Controllers;

use App\User;
use App\Video;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $course=new Course;
        $result=$course->retreiveDetails($user_id);
        // dd($result->toArray());
        // $result->course_id;
        // $courseCount=Video::where('couser_id',$courseId)->count();
        // dd($courseCount);
        return view('teacher.home')->with('courses',$result);
    }
    
    //add course
    public function addCourse(Request $request){

        $data=[
            "name"=>$request->name,
            "description"=>$request->description,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
            "user_id"=>$request->user_id,
        ];

        $user_id=Course::create($data)->user_id;
        $result=Course::where('user_id',$user_id)->orderBy('id','desc')->get();
        // return redirect('teacherHome');
        return back()->with('courses',$result)->with('success','Create Course successfull ! . . .');
    }

    //course update page
    public function updateCoursePage($id){
        $result=Course::where('id',$id)->first();
        // dd($result->toArray());
        return view('teacher.courseUpdatePage')->with('data',$result);
    }

    //update course
    public function updateCourse(Request $request){
        $course_id=$request->course_id;

        $data=[
            "name"=>$request->name,
            "description"=>$request->description,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
            "user_id"=>$request->user_id,
        ];

        Course::find($course_id)->update($data);

        return back()->with('update','Update Course Information Successfully ! . . .');
    }

    //delete course
    public function deleteCourse($id){
        Course::find($id)->delete();
        return redirect()->route('teacherHome')->with('delete','Delete Course Successfull ! . . .');
    }

    //Show Video
    public function showVideo($couseId){
    
        $course=new Course;
        $result=$course->retreiveCourse($couseId);
        // $video=new Video;
        // $videos=$video->retreiveByCourse($couseId);
        $videos=Video::where('course_id',$couseId)->paginate(2);
        // dd($videos->toArray());
        return view('teacher.video')->with('course',$result)->with('videos',$videos);
    }

    //Upload Video
    public function uploadVideo(Request $request){
        $message=[
            'title.required' => 'Video title is required!',
            'course_video.required' => 'Video is required!',
            'course_video.mimes' => 'File must be mp4 Type',
            'course_video.max' => 'Video cannot be larger than 60 MB'
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'course_video' => 'required| mimes:mp4| max:80000',
        ],$message);
    
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

    
        $file=$request->file('course_video');
        $fileName=uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path().'/videos/',$fileName);
        $data=[
        
            
            'title'=>$request->title,
            'video'=>$fileName,
            'course_id'=>$request->course_id
            
        ];
        $course_id=$request->course_id;
        Video::create($data);
        return back()->with('success','Video Upload Success !');
         }

    //video detail
    //delete video
    public function deleteVideo($video_id,$course_id){
        Video::findOrFail($video_id)->delete();
        return redirect('/teacher/video/'.$course_id)->with('delete','Delete Succces');
    }




    public function showMC(){
        return view('teacher.multipleChoice');
    }

    public function showAssignment(){
        return view('teacher.assignment');
    }

    public function showAudience(){
        return view('teacher.audience');
    }
}
