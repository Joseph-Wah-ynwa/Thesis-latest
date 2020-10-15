@extends('teacher.teacher')

@section('content')

<div class="row">
    <div class="col-md-2">
            <!-- menu -->
        <div class="btn-group-vertical w-100">
            

                <a href="{{url('teacher/video/'.$details->course_id)}}" class="btn btn-secondary"><i class="fas fa-video mr-2 float-left"></i>
                Videos
                </a>
    
                <a href="{{url('teacher/multipleChoice/'.$details->course_id)}}" class="btn btn-secondary "><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


                <a href="{{url('teacher/assignment/'.$details->course_id)}}" class="btn btn-secondary active"><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


                <a href="#" class="btn btn-secondary "><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        </div>
            <!-- end menu -->
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-6">
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
            <!-- update success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
            <strong>{{Session::get('success')}}</strong>
            </div>
        @endif

    <div class="card mt-4 shadow">
            <div class="card-body">
              <h3>{{$details->title}}</h3>
              <p>{{$details->description}}</p>
              
              
            </div>
          </div>

    </div>
    <div class="col-md-1">
            <br>
            <a href="{{url('teacher/assignment/'.$details->course_id)}}" class="btn btn-warning w-100 text-white" ><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
            <br>
            <br>
            <a href="#" class="btn btn-primary w-100"  data-toggle="modal" data-target="#updateModal"><i class="fas fa-edit mr-2"></i>Edit</a>
            <br>
            <br>
            <a href="#" class="btn btn-danger w-100" data-toggle="modal" data-target="#deleteModel"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
        </div>

        <!-- assignment update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('assignmentUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$details->id}}" name="assignment_id">

            <input type="hidden" value="{{$details->course_id}}" name="course_id">


            <label> Assignment Title</label><br>
            <input type="text" class="form-control" value="{{$details->title}}" name="title">
            <br>

            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$details->description}}</textarea>
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
        <a href="{{url('assignment/delete/'.$details->id.'/'.$details->course_id)}}" class="text-danger">Delete</a>
      </div>
     
    </div>
  </div>
</div>

<!-- end of delete model -->

@endsection