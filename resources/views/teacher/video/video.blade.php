@extends('teacher.teacher')

@section('content')
<div class="row">
<!-- menu -->
    <div class="col-md-3">
        <div class="btn-group-vertical">
        

            <a href="{{url('teacher/video/'.$course->id)}}" class="btn btn-secondary active"><i class="fas fa-video mr-2 float-left"></i>
            Videos
            </a>
 
            <a href="{{url('teacher/multipleChoice/'.$course->id)}}" class="btn btn-secondary "><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


            <a href="#" class="btn btn-secondary "><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


            <a href="#" class="btn btn-secondary "><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        </div>
    </div>
        <!-- end menu -->
    <div class="col-md-9 p-3">
    <?php
$number=0;
?>
<div>
<!-- Course Name -->
<h1 class="mb-3">{{$course->name}}</h1>
</div>

<a href="" class="btn btn-primary d3" data-toggle="modal" data-target="#videoUpload"><i class="fas fa-plus mr-2"></i>Add New Video</a>
<div class="row">  
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
                <!-- success upload message -->
                @if(Session::has('success'))
                    <div class="alert alert-success m-3">
                      <strong>{{Session::get('success')}}</strong>
                    </div>
                @endif

                 <!-- delete success message -->
                 @if(Session::has('delete'))
                    <div class="alert alert-success m-3">
                      <strong>{{Session::get('delete')}}</strong>
                    </div>
                @endif



    <div class="col-md-10"> 
            
@foreach($videos as $video)
        <div class="card my-5 d3-only" style="width: 100%">
        <div class="card-body">
            <h3 class="card-title"> {{$video->title}}</h3>
            <div class="card-subtitle text-muted float-right mb-3">
            {{$video->created_at->diffForHumans()}}
            </div>
            <video src="{{asset('videos/'.$video->video)}}" style="width:100%;" class="rounded" controls></video>
            <a href="{{url('video/detail/'.$video->id)}}" class="card-link mr-3"><i class="fas fa-info-circle mr-2"></i>Details . . .</a>
        </div>
        </div> 
@endforeach

{{$videos->links()}}
</div>
</div>
        
       
  
   
          

<!-- video upload Modal -->
<div class="modal fade" id="videoUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('uploadVideo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$course->id}}" name="course_id">
            Video Title<br>
            <input type="text" class="form-control" name="title">
            <br>
          
            <input type="file" class=" form-control" name="course_video">
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('uploadVideo')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$course->id}}" name="course_id">
            Video Title<br>
            <input type="text" class="form-control" name="title">
            <br>
          
            <input type="file" class=" form-control" name="course_video">
            <input type="submit" value="Upload" class="btn btn-primary mt-2">
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- end of delete model -->


    </div>
</div>



@endsection


