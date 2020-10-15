<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Register
Route::get('studentRegisterPage','StudentController@studentRegisterPage')->name('studentRegisterPage');

Route::get('/home', 'HomeController@index')->name('home');
//login
Route::post('loginCustom','LoginController@logincustom')->name('login.custom');

//logout
Route::get('logout','Auth\LoginController@logout')->name('logout');






//proteecting route
Route::group(['middleware' => 'auth'], function()
{
    //for testing
    Route::get('test',function(){
        return view('test');
    });


    //view composer
    View::composer(['*'],function($view){
        $user=Auth::user();
        $view->with('user',$user);
    });

  

    
//teacher
Route::get('teacherHome','CourseController@index')->name('teacherHome');

Route::get('teacher/courses','CourseController@courseAddV')->name('courseAddV');

Route::post('teache/courses/add','CourseController@addcourse')->name('addCourse');

Route::get('course/updatePage/{id}','CourseController@updateCoursePage')->name('updateCoursePage');

Route::post('course/update','CourseController@updateCourse')->name('updateCourse');

Route::get('course/delete/{id}','CourseController@deleteCourse')->name('deleteCourse');

Route::get('teacher/profile','TeacherController@profile')->name('teacherProfileV');

Route::post('teacher/profileName/change','TeacherController@updateName')->name('updateName');

Route::post('password/change','TeacherController@changePassword')->name('change_password');


// Video--------------------------------------
                                //retreive
Route::get('/teacher/video/{course_id}','CourseController@showVideo')->name('teacherVideoV');
                                //create
Route::post('teacher/video/upload','CourseController@uploadVideo')->name('uploadVideo');

                                //update
Route::get('video/detail/{id}','VideoController@detail')->name('videoDetail');

Route::post('video/update','VideoController@update')->name('videoUpdate');
    
                                //delete
Route::get('video/delete/{id}/{course_id}','CourseController@deleteVideo');



//multipleChoice-------------------------------------
                                //retreive
Route::get('/teacher/multipleChoice/{course_id}','multipleChoiceController@showMultipleChoice')->name('teacherMcV');
                                //create
Route::post('multipleChoice/tureFalseupload','multipleChoiceController@uploadTrueFalse')->name('multipleChoiceUpload');

Route::post('multipleChoice/threeOptionupload','multipleChoiceController@uploadThreeOptions')->name('threeOptionUpload');

Route::post('multipleChoice/fourOptionUpload','multipleChoiceController@uploadFourOptions')->name('fourOptionUpload');

                                //update
Route::get('multipleChoice/details/{id}','multipleChoiceController@detail')->name('multipleChoiceDetail');

Route::post('truefalse/update','multipleChoiceController@trueFalseUpdate')->name('truefalseUpdate');

Route::post('threeOption/update','multipleChoiceController@updateThreeOptions')->name('threeOptionUpdate');

Route::post('fourOption/update','multipleChoiceController@updateFourOptions')->name('fourOptionUpdate');
                                //delete
Route::get('multipleChoice/delete/{id}/{course_id}','multipleChoiceController@delete')->name('multipleChoiceDelete');

//assignment 

Route::get('/teacher/assignment/{course_id}','assignmentController@showAssignment')->name('teacherAssV');

Route::post('uploadAssignment','assignmentController@uploadAssignment')->name('uploadAssignment');

Route::get('assignment/detail/{id}','assignmentController@detail')->name('assignmentDetail');

Route::get('assignment/delete/{id}/{courseId}','assignmentController@delete')->name('assignmentDelete');

Route::post('assignmentUpdate','assignmentController@update')->name('assignmentUpdate');


//student
// student middleware
Route::group(['middleware' => 'checkStudent'], function()
{



Route::get('studentHome','StudentController@homePage')->name('studentHome');

Route::post('search','studentController@search')->name('search');
});
// end of student middleware
    
});







