<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- for responsive -->
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- font Cario -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    <!-- font dancing script -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- fontsome -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    
</head>

<body>
<!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-sticky">
        <a class="navbar-brand" href="#"><i class="fas fa-graduation-cap mr-2"></i>WebDev LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item  @yield('home_nav')">
                    <a class="nav-link" href="{{route('teacherHome')}}"><i class="fas fa-home mr-1"></i>Home </a>
                </li>

                <li class="nav-item @yield('profile_nav')">
                    <a class="nav-link" href="{{route('teacherProfileV')}}"><i class="fas fa-user-circle mr-1"></i>Profile </a>
                </li>

               
            </ul>

           

            <div class="dropdown mr-5">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$user->name}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="nav-link text-danger" href="{{route('logout')}}"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                   
                </div>
            </div>

        </div>
    </nav>
<!-- end navbar -->


    <div class="container-fluid mt-4">
       @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
