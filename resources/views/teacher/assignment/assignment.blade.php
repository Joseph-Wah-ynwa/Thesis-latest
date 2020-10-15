@extends('teacher.teacher')


@section('content')
<div class="row">
    <div class="col-md-2">
            <!-- menu -->
        <div class="btn-group-vertical w-100">
            

                <a href="{{url('teacher/video/'.$course->id)}}" class="btn btn-secondary"><i class="fas fa-video mr-2 float-left"></i>
                Videos
                </a>
    
                <a href="{{url('teacher/multipleChoice/'.$course->id)}}" class="btn btn-secondary "><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


                <a href="{{url('teacher/assignment/'.$course->id)}}" class="btn btn-secondary active"><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


                <a href="#" class="btn btn-secondary "><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        </div>
            <!-- end menu -->
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-8">
        <div>
            <!-- Course Name -->
            <h1 class="mb-3">{{$course->name}}</h1>
        </div>

        <a href="" class="btn btn-primary d3" data-toggle="modal" data-target="#assignmentUpload"><i class="fas fa-plus mr-2"></i>Add New Assignment</a>
            <!-- validation message -->
            @if ($errors->any())
                          <div class="alert alert-danger mt-3">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
            @endif
             <!-- delete success message -->
            @if(Session::has('delete'))
                    <div class="alert alert-success mt-3">
                      <strong>{{Session::get('delete')}}</strong>
                    </div>
            @endif

          @foreach($assignments as $assignment)
          <div class="card mt-4 shadow">
            <div class="card-body">
              <h3>{{$assignment->title}}</h3>
              <p>{{$assignment->description}}</p>
              <a href="{{url('assignment/detail/'.$assignment->id)}}" class="card-link mr-3"><i class="fas fa-info-circle mr-2"></i>Details . . .</a>
              
            </div>
          </div>
          @endforeach


        </div>
  </div>
 
 <!-- assignment upload Modal -->
<div class="modal fade" id="assignmentUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('uploadAssignment')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$course->id}}" name="course_id">


            <label> Assignment Title</label><br>
            <input type="text" class="form-control" name="title">
            <br>

            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control" ></textarea>
            <br>

            <label>Document <span style="font-size:70%"> (If needed)</span></label>
            <input type="file" class="form-control" name="assignment" >


            <input type="submit" value="Upload" class="btn btn-primary mt-2">
        </form>
      </div>
     
    </div>
  </div>
</div>
  <!-- end of video upload Modal -->

   
@endsection