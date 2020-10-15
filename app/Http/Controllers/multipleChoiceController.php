<?php

namespace App\Http\Controllers;

use App\Course;
use App\Option;
use App\MultipleChoice;
use Illuminate\Http\Request;

class multipleChoiceController extends Controller
{
    public function showMultipleChoice($couseId){
        $course=new Course;
        $result=$course->retreiveCourse($couseId);

        $MC=MultipleChoice::where('course_id',$couseId)->get();
        return view('teacher.multipleChoice.multipleChoice')->with('course',$result)->with('MCs',$MC);
    }

    //true false upload
    public function uploadTrueFalse(Request $request){
        $question=[
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'course_id'=>$request->course_id
        ];

        $mc_id=MultipleChoice::create($question)->id;
       
        $option1=[
            'option_title'=>'A',
            'option'=> 'True',
            'multiple_choice_id'=>$mc_id
        ];

        $option2=[
            'option_title'=>'B',
            'option'=> 'False',
            'multiple_choice_id'=>$mc_id
        ];
        Option::create($option1);
        Option::create($option2);
        return back()->with('success','Upload Successfull ! ..');
       }

    //three options upload
       public function uploadThreeOptions(Request $request){
        $question=[
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'course_id'=>$request->course_id
        ];

        $mc_id=MultipleChoice::create($question)->id;

        $option1=[
            'option_title'=>'A',
            'option'=>$request->option1,
            'multiple_choice_id'=>$mc_id
        ];

        $option2=[
            'option_title'=>'B',
            'option'=>$request->option2,
            'multiple_choice_id'=>$mc_id
        ];

        $option3=[
            'option_title'=>'C',
            'option'=>$request->option3,
            'multiple_choice_id'=>$mc_id
        ];
        Option::create($option1);
        Option::create($option2);
        Option::create($option3);
        return back()->with('success','Upload Successfull ! ..');
       }


       //four option upload
       public function uploadFourOptions(Request $request){
        $question=[
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'course_id'=>$request->course_id
        ];

        $mc_id=MultipleChoice::create($question)->id;

        $option1=[
            'option_title'=>'A',
            'option'=>$request->option1,
            'multiple_choice_id'=>$mc_id
        ];

        $option2=[
            'option_title'=>'B',
            'option'=>$request->option2,
            'multiple_choice_id'=>$mc_id
        ];

        $option3=[
            'option_title'=>'C',
            'option'=>$request->option3,
            'multiple_choice_id'=>$mc_id
        ];

        $option4=[
            'option_title'=>'D',
            'option'=>$request->option4,
            'multiple_choice_id'=>$mc_id
        ];

        Option::create($option1);
        Option::create($option2);
        Option::create($option3);
        Option::create($option4);
        return back()->with('success','Upload Successfull ! ..');
       }


       //update true false question
       public function trueFalseUpdate(Request $request){
        //   dd($request->all());

           $mc_id=$request->mc_id;
           $option_id=$request->option_id;

           
        $question=[
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'course_id'=>$request->course_id
        ];

        MultipleChoice::find($mc_id)->update($question);

        $option1=[
            'option_title'=>'A',
            'option'=> 'True',
            'multiple_choice_id'=>$mc_id
        ];

        $option2=[
            'option_title'=>'B',
            'option'=> 'False',
            'multiple_choice_id'=>$mc_id
        ];
        Option::find($option_id)->update($option1);
        Option::find($option_id)->update($option2);
        return back()->with('success','Update Successfull ! ..');
       }

       //detail
       public function detail($id){
           $result=MultipleChoice::find($id);
           
           return view('teacher.multipleChoice.detail')->with('mc_details',$result);
       }

       //update three options
       public function updateThreeOptions(Request $request){
        // dd($request->all());

            $mc_id=$request->mc_id;
            $optionA=$request->A1;
            $optionB=$request->B1;
            $optionC=$request->C1;

        $question=[
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'course_id'=>$request->course_id
        ];

        MultipleChoice::find($mc_id)->update($question);

        $option1=[
            'option_title'=>'A',
            'option'=>$request->A,
            'multiple_choice_id'=>$mc_id
        ];

        $option2=[
            'option_title'=>'B',
            'option'=>$request->B,
            'multiple_choice_id'=>$mc_id
        ];

        $option3=[
            'option_title'=>'C',
            'option'=>$request->C,
            'multiple_choice_id'=>$mc_id
        ];
        Option::find($optionA)->update($option1);
        Option::find($optionB)->update($option2);
        Option::find($optionC)->update($option3);
        return back()->with('success','Upload Successfull ! ..');
       }


        //update four options
        public function updateFourOptions(Request $request){
            // dd($request->all());
    
                $mc_id=$request->mc_id;
                $optionA=$request->A1;
                $optionB=$request->B1;
                $optionC=$request->C1;
                $optionD=$request->D1;
    
            $question=[
                'question'=>$request->question,
                'answer'=>$request->answer,
                'type'=>$request->type,
                'course_id'=>$request->course_id
            ];
    
            MultipleChoice::find($mc_id)->update($question);
    
            $option1=[
                'option_title'=>'A',
                'option'=>$request->A,
                'multiple_choice_id'=>$mc_id
            ];
    
            $option2=[
                'option_title'=>'B',
                'option'=>$request->B,
                'multiple_choice_id'=>$mc_id
            ];
    
            $option3=[
                'option_title'=>'C',
                'option'=>$request->C,
                'multiple_choice_id'=>$mc_id
            ];

            $option4=[
                'option_title'=>'D',
                'option'=>$request->D,
                'multiple_choice_id'=>$mc_id
            ];

            Option::find($optionA)->update($option1);
            Option::find($optionB)->update($option2);
            Option::find($optionC)->update($option3);
            Option::find($optionD)->update($option4);
            return back()->with('success','Upload Successfull ! ..');
           }


       //delete multiplechoice
       public function delete($mc_id,$course_id){
            MultipleChoice::find($mc_id)->delete();
            Option::where('multiple_choice_id',$mc_id)->delete();
            return redirect('/teacher/multipleChoice/'.$course_id)->with('delete','Delete Multiple Choice Successful ! . . ');
       }
       
}
