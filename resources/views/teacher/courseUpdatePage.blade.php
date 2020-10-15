@extends('teacher.teacher')

@section('content')
    <div class="container">
        <div class="row">

        <!-- course create success message -->
                 @if(Session::has('update'))
                    <div class="alert alert-success mt-5 w-50">
                    {{Session::get('update')}}
                    </div>
   			    @endif

            <div class="col-md-8">
                <label> <b> Course Name</b></label>
                <input type="text" class="form-control" value="{{$data->name}}" readonly>
                <br>

                <label for="des"> <b>Description</b></label>
                <textarea name="description" id="des" class="form-control" placeholder="Description" readonly required>{{$data->description}}</textarea>
                <br>

                <label> <b> Start Date</b></label>
                <input type="text" class="form-control" value="{{date('d-M-Y', strtotime($data->start_date)) }}"readonly>
                <br>

                <label> <b> End Date</b></label>
                <input type="text" class="form-control" value="{{date('d-M-Y', strtotime($data->end_date)) }}"readonly>
                <br>

            </div>
            <div class="col-md-2">
                <a href="{{route('teacherHome')}}" class="btn btn-primary w-100"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
                <br>
                <br>
                <a href="#" class="btn btn-warning w-100" data-toggle="modal" data-target="#updateCourse"><i class="fas fa-edit mr-2"></i>Edit</a>
                <br>
                <br>
                <a href="#" class="btn btn-danger w-100" data-toggle="modal" data-target="#deleteModel"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
            </div>
        </div>
    </div>

    <!-- update model -->
    <div class="modal fade" id="updateCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            
                            <form action="{{route('updateCourse')}}" method="POST">
                                @csrf

                                    <input type="hidden" name="course_id" value="{{$data->id}}">

                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                                    <label for="name"> <b>Name</b></label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Course Name" value="{{$data->name}}" required>
                                    <br>

                                    <textarea name="description" id="des" class="form-control" placeholder="Description" required>{{$data->description}}</textarea>
                                    <br>


                                    <label for="start">  <b>Start Date</b><span class="text-muted ml-3" style="font-size:70%;">(Start Date must not ealier than Current Date)</span></label>
                                    <input type="date" id="start" name="start_date" class="form-control" value="{{$data->start_date}}" required>
                                    <br>


                                    <label for="end"><b>End Date</b><span class="text-muted ml-3" style="font-size:70%;">(End date must not earlier than Start Date)</span></label>
                                    <input type="date" id="end" name="end_date" class="form-control" value="{{$data->end_date}}" required>
                                    <br>


                                    <button type="submit" class="btn btn-primary mt-3">Update Course</button>
                            </form>
                        
                        </div>
                        
                        </div>
                    </div>
    </div>
    <!-- end update model -->

    <!-- delete model -->
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                
                <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <h5 class="modal-title mb-4" id="exampleModalLabel">Are you sure to delete ?</h5>
                    <a class="text-primary mr-3" data-dismiss="modal">Cancel</a>
                    <a href="{{url('course/delete/'.$data->id)}}" class="text-danger">Delete</a>
                </div>
                
                </div>
            </div>
    </div>
    <!-- end delete model -->
@endsection