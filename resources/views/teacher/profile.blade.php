@extends('teacher.teacher')

@section('profile_nav')
active
@endsection

@section('content')
    <div class="row m-5">
        <div class="col-md-6">
          <!-- validation (manual input) -->
            @if($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
             @endif

        <!-- for updated aleret message -->
            @if(Session::has('message'))
            <div class="alert alert-success ">
              <strong>{{Session::get('message')}}</strong>
            </div>
            @endif

        <!-- validation (update password )-->
              @if(Session::has('passwordValidate'))
                <div class="alert alert-danger">
                  <strong>{{Session::get('passwordValidate')}}</strong>
                </div>
            @endif

        <!-- success message (update password )-->
            @if(Session::has('passwordUpdate'))
                <div class="alert alert-success">
                  <strong>{{Session::get('passwordUpdate')}}</strong>
                </div>
            @endif

            @foreach($datas as $teacher)
            <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Profile</h1>
                            <div class="row">
                                <div class="col-md-5 text-primary">
                                Name 
                                </div>
                                <!-- <div class="col-md-1">
                                -
                                </div> -->
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$teacher->name}}" readonly>
                               
                                </div>
                            </div>
                            <br>

                            <div class="row mb-4">
                                <div class="col-md-5 text-primary">
                                E-Mail
                                </div>
                                <!-- <div class="col-md-1 col-sm-0">
                                -
                                </div> -->
                                <div class="col-md-6 text-muted">
                                <input type="text" class="form-control" value="{{$teacher->email}}" readonly>
                                
                                </div>
                            </div>

                            <a href="#" class="btn btn-secondary d3 mr-4" data-toggle="modal" data-target="#changeName"><i class="fas fa-exchange-alt mr-2"></i>Change name</a>

                            <br>
                            <br>

                            <a href="#" class="btn btn-warning d3" data-toggle="modal" data-target="#changePassword"><i class="fas fa-key mr-2"></i>Change Password</a>
                           
                        </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- change Name Modal -->
<div class="modal fade" id="changeName" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('updateName')}}" method="POST">
              @csrf
            <label for="name">
                Name
            </label>
            <input type="text" class="form-control" value="{{$teacher->name}}" name="name" required>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" value="Save changes">
        
        </form>
    </div>
    </div>
  </div>
</div>

<!-- change password Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b> Change Password </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('change_password')}}" method="post">
        @csrf
          <!-- old password -->
        <label for="old">
            Old Password
        </label>
        <input type="password" id="old" class="form-control" name="oldPassword" required>
        <br>
        <!-- new password -->
        <label for="new">
            Old Password
        </label>
        <input type="password" id="new" class="form-control" name="newPassword" required>
        <br>
        <!-- comfirm new password -->
        <label for="old">
           Comfirm New Password
        </label>
        <input type="password" class="form-control" name="comfirmPassword" required>
        <br>
        <button type="submit" class="btn btn-info">Change</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection