@extends('teacher.teacher')

@section('content')

               
<div class="row">
        <!-- menu -->
    <div class="col-md-2">
        <div class="btn-group-vertical w-100">
        

            <a href="{{url('teacher/video/'.$details->course_id)}}" class="btn btn-secondary active"><i class="fas fa-video mr-2 float-left"></i>
            Videos
            </a>
 
            <a href="{{url('teacher/multipleChoice/'.$details->course_id)}}" class="btn btn-secondary "><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


            <a href="#" class="btn btn-secondary "><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


            <a href="#" class="btn btn-secondary @"><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        </div>
    </div>
        <!-- end menu -->
        <div class="col-md-1"></div>
        <div class="col-md-6">
              <!-- update success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success m-3">
                      <strong>{{Session::get('success')}}</strong>
                    </div>
                @endif
                {{$details->courseConnect->name}}
            <h3>{{$details->title}}</h3>
            <video src="{{asset('videos/'.$details->video)}}" style="width:100%;" class="rounded" controls></video>
        </div>


        <div class="col-md-1">
            <br>
            <a href="{{url('teacher/video/'.$details->course_id)}}" class="btn btn-warning w-100 text-white" ><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
            <br>
            <br>
            <a href="#" class="btn btn-primary w-100"  data-toggle="modal" data-target="#updateModal"><i class="fas fa-edit mr-2"></i>Edit</a>
            <br>
            <br>
            <a href="#" class="btn btn-danger w-100" data-toggle="modal" data-target="#deleteModel"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
        </div>
</div>

<!-- update model -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Video Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('videoUpdate')}}" method="post" enctype="multipart/form-data">
              @csrf
        <input type="hidden" value="{{$details->id}}" name="video_id">
        <input type="hidden" value="{{$details->course_id}}" name="course_id">
        <input type="text" class="form-control" value="{{$details->title}}" name="name" required>
        <br>
        <input type="file" class="form-control" name="video" required>
        <br>
        <input type="submit" value="Save Changes" class="btn btn-success">
        </form>
      </div>
     
    </div>
  </div>
</div>


<!-- end of update model -->

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
        <a href="{{url('video/delete/'.$details->id.'/'.$details->course_id)}}" class="text-danger">Delete</a>
      </div>
     
    </div>
  </div>
</div>

<!-- end of delete model -->


@endsection