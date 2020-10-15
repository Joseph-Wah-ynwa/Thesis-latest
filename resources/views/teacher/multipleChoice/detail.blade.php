@extends('teacher.teacher')


@section('content')

<div class="row">
    <div class="col-md-2">
    <!-- menu -->
    
        <div class="btn-group-vertical w-100">
        

            <a href="{{url('teacher/video/'.$mc_details->course_id)}}" class="btn btn-secondary"><i class="fas fa-video mr-2 float-left"></i>
            Videos
            </a>
 
            <a href="{{url('teacher/multipleChoice/'.$mc_details->course_id)}}" class="btn btn-secondary active"><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


            <a href="{{url('teacher/assignment/'.$mc_details->course_id)}}" class="btn btn-secondary "><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


            <a href="#" class="btn btn-secondary "><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        
        </div>
    <!-- end menu -->
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-6">
              <!-- success upload message -->
              @if(Session::has('success'))
                    <div class="alert alert-success">
                      <strong>{{Session::get('success')}}</strong>
                    </div>
              @endif

                  <div class="card d3-only" >
                      <div class="card-body">
                      {{$mc_details->question}} <br><br>
                      @foreach($mc_details->optionConnect as $option)
                      {{$option->option_title}} . {{$option->option}} <br>
                      @endforeach
                      <br>
                      Answer = <span class="text-success">{{$mc_details->answer}}</span>
                      </div>
                  </div>
       
            

       
    </div>
    <div class="col-md-1">
        <a href="{{url('/teacher/multipleChoice/'.$mc_details->course_id)}}" class="btn btn-primary w-100"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
        <br>
        <br>
        <a href="#" class="btn btn-warning w-100" data-toggle="modal" data-target="#{{$mc_details->type}}"><i class="fas fa-edit mr-2"></i>Edit</a>
        <br>
        <br>
        <a href="#" class="btn btn-danger w-100" data-toggle="modal" data-target="#deleteModel"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
    </div>
</div>

 <!-- Multiple choice delete model -->
 <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title mb-4" id="exampleModalLabel"><i class="fas fa-exclamation-triangle mr-2"></i>Are you sure to delete?</h5>
        <a type="button" class="text-primary card-link mr-4" data-dismiss="modal">Cancel</a>
        <a href="{{url('multipleChoice/delete/'.$mc_details->id.'/'.$mc_details->course_id)}}" class="text-danger card-link mr-3">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- end of Multiple choice delete model -->

<!-- true false option update model -->
<div class="modal fade" id="truefalse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <legend><h3>Update MultipleChoice</h3></legend>

          <form action="{{route('truefalseUpdate')}}" method="post">
          @csrf
            <input type="hidden" value="{{$mc_details->id}}" name="mc_id">
            <input type="hidden" value="{{$option->id}}" name="option_id">
            <input type="hidden" value="{{$mc_details->course_id}}" name="course_id">
            <input type="hidden" value="truefalse" name="type">
            <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required>
            {{$mc_details->question}}
            </textarea>
           

             <br>
            A. True <br>
            B. False <br><br>

            Correct Answer . . .
                <select class="custom-select mb-3" name="answer">
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>


        <input type="submit" class="btn btn-warning" value="Update">

        </form>
      </div>
    </div>
  </div>
</div>
<!-- end of true false update model -->

<!-- three option update model -->
<div class="modal fade" id="three" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <legend>Update MultipleChoice</legend>
                <form action="{{route('threeOptionUpdate')}}" method="post"> 
                @csrf           
                    <input type="hidden" value="{{$mc_details->id}}" name="mc_id">
                    @foreach($mc_details->optionConnect as $option)
                    <input type="hidden" value="{{$option->id}}" name="{{$option->option_title}}1">
                    @endforeach
                    
                    <input type="hidden" value="{{$mc_details->course_id}}" name="course_id">
                    <input type="hidden" value="{{$mc_details->type}}" name="type">
                    <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required>
                    {{$mc_details->question}}
                    </textarea>
                  

                    <br>
                    @foreach($mc_details->optionConnect as $option)
                    {{$option->option_title}} . <input type="text" class="form-control" value="{{$option->option}}" name="{{$option->option_title}}">   <br>
                    @endforeach

                    Correct Answer . . .
                        <select class="custom-select mb-3" name="answer">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>

                        <input type="submit" class="btn btn-warning" value="Update">

                </form>

      </div>
    </div>
  </div>
</div>
<!-- end of three option update model -->

<!-- four option update model -->
<div class="modal fade" id="four" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <h3>Update MultipleChoice</h3>
                <form action="{{route('fourOptionUpdate')}}" method="post"> 
                @csrf           
                    <input type="hidden" value="{{$mc_details->id}}" name="mc_id">
                    @foreach($mc_details->optionConnect as $option)
                    <input type="hidden" value="{{$option->id}}" name="{{$option->option_title}}1">
                    @endforeach
                    
                    <input type="hidden" value="{{$mc_details->course_id}}" name="course_id">
                    <input type="hidden" value="{{$mc_details->type}}" name="type">
                    <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required>
                    {{$mc_details->question}}
                    </textarea>
                  

                    <br>
                    @foreach($mc_details->optionConnect as $option)
                    {{$option->option_title}} . <input type="text" class="form-control" value="{{$option->option}}" name="{{$option->option_title}}">   <br>
                    @endforeach

                    Correct Answer . . .
                        <select class="custom-select mb-3" name="answer">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>

                        <input type="submit" class="btn btn-warning" value="Update">

                </form>

      </div>
    </div>
  </div>
</div>
<!-- end of four option update model -->

@endsection