@extends('student.master')
<!-- css -->
@section('css')
<link rel="stylesheet" href="{{asset('css/searchList.css')}}">
@endsection


@section('content')
<div class="container pt-5">
                @if(Session::has('a'))
                <div class="alert alert-success mt-5 w-50">
                {{Session::get('a')}}
                </div>
   			    @endif
   
   
    <div class="row m-4" id="top">
        <!-- up arrow -->
    <a href="#navForScroll" class="icon"><i class="far fa-arrow-alt-circle-up fa-5x "></i></a>


        <div class="col-md-2"></div>

        <div class="col-md-8">    
        @foreach($courses as $course)
        
            <div class="card my-4 d3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted float-right">{{$course->userConnect->name}}</h6>

                    <h5 class="card-title"><b>{{$course->name}}</b></h5>
                    
                    <h5 class="card-subtitle mb-2 text-muted">89 Enrollment(s)</h5>
                    <p class="card-text">{{$course->description}}</p>
                    
                    <br>
                    
                    <a href="#" class="btn btn-outline-primary">VIEW</a>
                    
                </div>
            </div>
        
        @endforeach
        </div>
    </div>
</div>
@endsection
