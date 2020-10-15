<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logincustom(Request $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            // dd('yes');
            $user=User::where('email',$request->email)->first();
            if($user->role == 2){
                // dd('student home');
                 return redirect('studentHome');
                 
            }else{
                // dd('teacher home');
                 return redirect('teacherHome');
                 
            }
        }else{
            return back()->with('unsuccess','Email and Password Do NOT Match !!!!!!!!!!! '); 
        }
     }
}
