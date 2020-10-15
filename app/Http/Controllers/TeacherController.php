<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function profile(){
        $user_id=Auth::user()->id;
        // dd($user_id);
        $user=new User;
        $result=$user->retreiveDetails($user_id);
        // dd($result);
        return view('teacher.profile')->with('datas',$result);
    }

    //update name
    public function updateName(Request $request){
        $user_id=Auth::user()->id;
        $name=$request->name;
        $user=new User;
        $result=$user->updateName($user_id,$name);
        return redirect('teacher/profile')->with('message','Updated Name');
    }

    //change password
    public function changePassword(Request $request){
         //validation
         $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'comfirmPassword' => 'required_with:newPassword|same:newPassword',
        ]);

        if ($validator->fails()) {
            return redirect()->route('teacherProfileV')
                        ->withErrors($validator)
                        ->withInput();
        }

        $id=auth()->user()->id;
        

            $old_password=$request->oldPassword;
            $new_password=$request->newPassword;
            $comfirm_password=$request->comfirmPassword;

            $test=User::find($id)->password;

            if(!Hash::check($old_password , $test))
            {
                return back()->with('passwordValidate','Old Password is not correct');
            }
            else
            {
                $hash_newPassword=Hash::make($new_password);

                $data=[
                        'password'=>$hash_newPassword,
                    ];

                User::findOrFail($id)->update($data);

                return back()->with('passwordUpdate','Password update correctly !...');
            
            }
    }

    
}
