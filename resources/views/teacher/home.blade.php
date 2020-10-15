
@extends('teacher.teacher')

@section('home_nav')
active
@endsection

@section('content')
    <div class="container p-4">
                <a  class="btn btn-primary d3 text-white" data-toggle="modal" data-target="#createCourse"><i class="fas fa-plus mr-2"></i>Add Course</a>
                <!-- course create success message -->
                @if(Session::has('success'))
                <div class="alert alert-success mt-5 w-50">
                {{Session::get('success')}}
                </div>
   			    @endif

                <!-- course delete success message -->
                @if(Session::has('delete'))
                <div class="alert alert-success mt-5 w-50">
                {{Session::get('delete')}}
                </div>
   			    @endif

                <!-- course delete success message -->
                @if(Session::has('unsuccess'))
                <div class="alert alert-danger mt-5 w-50">
                {{Session::get('unsuccess')}}
                </div>
   			    @endif

                <div class="row my-4">
                    @foreach($courses as $course)
                        <div class="col-md-4 mb-3">
                            <div class=" card d3 shadow">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight:700;">
                                    {{$course->name}}
                                    </h5>
                                    <ul  class="course_list">
                                        <li> 
                                            <i class="fas fa-video mr-1"></i>
                                            <a href="{{url('teacher/video/'.$course->id)}}">{{count($course->videoConnect)}}    Video (s)</a></li>
                                        <li> 
                                            <i class="fas fa-list mr-1"></i>
                                            <a href="{{url('teacher/multipleChoice/'.$course->id)}}">{{count($course->multipleChoiceConnect)}} Multiple choice (s)</a></li>
                                        <li>
                                            <i class="fas fa-book mr-1"></i>
                                            <a href="{{url('/teacher/assignment/'.$course->id)}}">{{count($course->assignmentConnect)}} Assignment (s)</a></li>
                                    </ul>

                                    <div class="float-right">
                                    Start Date :: <span class="text-success">{{date('d-M-Y', strtotime($course->start_date)) }}</span>
                                    </div>
                                    <div class="float-right">
                                    End Date :: <span class="text-danger">{{date('d-M-Y', strtotime($course->end_date)) }}</span>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <a href="{{url('course/updatePage/'.$course->id)}}" class="btn btn-primary float-right" >Course -- Update/Delete </a>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    
                </div>
               

                    <!-- COurse Upload Modal -->
                    <div class="modal fade" id="createCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        <form action="{{route('addCourse')}}" method="POST">
                             @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <label for="name"> <b>Name</b></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Course Name" required>
                                <br>

                                <label for="des"> <b>Description</b></label>
                                <textarea name="description" id="des" class="form-control" placeholder="Description" required></textarea>
                                
                                <br>

                                
                                <label for="start">  <b>Start Date</b><span class="text-muted ml-3" style="font-size:70%;">(Start Date must not ealier than Current Date)</span></label>
                                <input type="date" id="start" name="start_date" class="form-control" required>
                                <br>


                                <label for="end"><b>End Date</b><span class="text-muted ml-3" style="font-size:70%;">(End date must not earlier than Start Date)</span></label>
                                <input type="date" id="end" name="end_date" class="form-control" required>
                                <br>


                                <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus mr-2"></i>Add Course</button>
                        </form>
                        
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    <!-- end of course upload course -->

                    
        </div>            
@endsection


