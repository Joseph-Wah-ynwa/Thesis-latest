<?php

namespace App\Http\Controllers;

use App\Course;
use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    public function showAssignment($courseId){
        $result=Course::where('id',$courseId)->first();

        $assignment=Assignment::where('course_id',$courseId)->get();
        return view('teacher.assignment.assignment')->with('course',$result)->with('assignments',$assignment);
    }

    //upload assignment
    public function uploadAssignment(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'assignment' => 'required|max:10000|mimes:doc,docx',
        ]);
    
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $file=$request->file('assignment');
        $fileName=uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path().'/assignments/',$fileName);
        
        
        $data=[
            "title"=>$request->title,
            "description"=>$request->description,
            "assignment"=>$fileName,
            "course_id"=>$request->course_id,
        ];
        Assignment::create($data);
        return back()->with('success','Assignment Upload Success');

    }

    //detail
    public function detail($id){
        $result=Assignment::find($id);
        return view('teacher.assignment.detail')->with('details',$result);
        
        }

    //delete
    public function delete($id,$courseId){
        $result=Assignment::find($id)->delete();
        return redirect('teacher/assignment/'.$courseId)->with('delete','Delete assignemnt sucessfully');
    }

    public function update(Request $request){
        // dd('here');
        // dd($request->all());
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'assignment' => 'required|max:10000|mimes:doc,docx',
        ]);
    
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        //end validation


        $file=$request->file('assignment');
        $fileName=uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path().'/assignments/',$fileName);
        $data=[
            "title"=>$request->title,
            "description"=>$request->description,
            "assignment"=>$fileName,
            "course_id"=>$request->course_id,
        ];
        $id=$request->assignment_id;
        Assignment::find($id)->update($data);
        return back()->with('success','Update assignment successfully');
    }
}
