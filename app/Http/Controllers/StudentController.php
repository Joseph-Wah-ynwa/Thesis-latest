<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function studentRegisterPage(){
        // dd('student');
        return view('student.studentRegister');
    }
    
    //
    public function homePage(){
        return view('student.master');
    }

    public function search(Request $request){
        // dd($request->all());
        // dd($request->searchName);
        // return view('student.searchList');
        $searchItem = $request->searchName;
        
        $result = Course::where('name','LIKE','%'.$searchItem.'%')->orWhere('description','LIKE','%'.$searchItem.'%')->orWhereHas('userConnect', function($q) use ($searchItem) {
            return $q->where('name', 'LIKE', '%' . $searchItem . '%')->orWhere('email','LIKE','%'.$searchItem.'%');
        })->get();
        // dd($result->toArray());
        // dd(count($result));
        if(count($result) > 0){
            // dd('yes');
            return view('student.searchList')->with('courses',$result);
        }else{
            // Session::flash('a','No Course Found !!!');
            return view('student.searchList')->with('courses',$result)->with('a','No Course Found !!!!!');
        } 
           
       
    }
}
