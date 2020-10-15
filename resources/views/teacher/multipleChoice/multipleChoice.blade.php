@extends('teacher.teacher')


@section('content')
<div class="row">
<!-- menu -->
    <div class="col-md-2">
        <div class="btn-group-vertical w-100">
        

            <a href="{{url('teacher/video/'.$course->id)}}" class="btn btn-secondary"><i class="fas fa-video mr-2 float-left"></i>
            Videos
            </a>
 
            <a href="{{url('teacher/multipleChoice/'.$course->id)}}" class="btn btn-secondary active"><i class="fas fa-list mr-2 float-left"></i>Multiple Choice</a>


            <a href="{{url('teacher/assignment/'.$course->id)}}" class="btn btn-secondary "><i class="fas fa-book mr-2 float-left"></i>Assignments</a>


            <a href="#" class="btn btn-secondary "><i class="fas fa-users mr-2 float-left"></i>Audience</a>
        </div>
    </div>
    <!-- end menu -->

    <div class="col-md-1"></div>
    <!-- data field -->
    <div class="col-md-7 p-3">

    <div>
    <!-- Course Name -->
    <h1 class="mb-3">{{$course->name}}</h1>
    </div>

            <!-- success upload message -->
              @if(Session::has('success'))
                    <div class="alert alert-success m-3">
                      <strong>{{Session::get('success')}}</strong>
                    </div>
              @endif

            <!-- success delete message -->
              @if(Session::has('delete'))
                    <div class="alert alert-success m-3">
                      <strong>{{Session::get('delete')}}</strong>
                    </div>
              @endif

    
    <!-- drop down -->
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle mb-3 d3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add Multiple Choice
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#two">Ture/False </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#threeInsert">3 options</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fourInsert">4 options</a>
        </div>
    </div>
    <!-- end drop down -->


    @foreach($MCs as $mc)
    <div class="card shadow mb-3">
        <div class="card-body">
            <p class="card-text">{{$mc->question}}</p>
            @foreach($mc->optionConnect as $option)
            {{$option->option_title}} . {{$option->option}} <br>
            @endforeach
            <br>
            Answer = <span class="text-success">{{$mc->answer}}</span>
            <br>
            <div class="mt-4">
              <a href="{{url('multipleChoice/details/'.$mc->id)}}" class="card-link mr-3"><i class="fas fa-info-circle mr-2"></i>Details . . .</a>
            </div>
        </div>
    </div>

   @endforeach

    
    
     </div>
    <!-- end of data field -->
</div>




<!-- ture false model -->
<!-- Modal -->
<div class="modal fade" id="two" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Multiple Choice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('multipleChoiceUpload')}}" method="POST">
            @csrf
                <input type="hidden" value="{{$course->id}}" name="course_id">
                <input type="hidden" value="truefalse" name="type">
                <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required></textarea>
                <br>
                A. True <br>
                B. False <br>
                <br>
                Correct Answer . . .
                <select class="custom-select" name="answer">
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
                <input type="submit" value="Upload" class="btn btn-primary float-right mt-2">
            </form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- end of true false model -->

<!-- 3 options model -->
<!-- Modal -->
<div class="modal fade" id="threeInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Multiple Choice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('threeOptionUpload')}}" method="POST">
            @csrf
                <input type="hidden" value="{{$course->id}}" name="course_id">
                <input type="hidden" value="three" name="type">
                <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required></textarea>
                <br>
                A. <input type="text" class="form-control" name="option1" required><br>
                B. <input type="text" class="form-control" name="option2" required> <br>
                C. <input type="text" class="form-control" name="option3" required> <br>
                <br>
                Correct Answer . . .
                <select class="custom-select" name="answer">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
                <input type="submit" value="Upload" class="btn btn-primary float-right mt-2">
            </form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- end of 3 options model -->

<!-- 4 options model -->

<div class="modal fade" id="fourInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Multiple Choice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{route('fourOptionUpload')}}" method="POST">
            @csrf
                <input type="hidden" value="{{$course->id}}" name="course_id">
                <input type="hidden" value="four" name="type">
                <textarea name="question" rows="4" cols="20" class="form-control" placeholder="Question . . ." required></textarea>
                <br>
                A. <input type="text" class="form-control" name="option1" required><br>
                B. <input type="text" class="form-control" name="option2" required> <br>
                C. <input type="text" class="form-control" name="option3" required> <br>
                D. <input type="text" class="form-control" name="option4" required> <br>
                <br>
                Correct Answer . . .
                <select class="custom-select" name="answer">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <input type="submit" value="Upload" class="btn btn-primary float-right mt-2">
            </form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- end of 4 options model -->


@endsection


