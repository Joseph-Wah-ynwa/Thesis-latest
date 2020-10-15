<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Teko:wght@600&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Kalam', cursive;
            font-family: 'Teko', sans-serif;
        }
        .container{
            padding:30px;
        }
        .grid{
            display:grid;
            grid-template-columns: auto auto auto;
            grid-gap: 30px;
        }
        .grid-item{
            padding:10px;
            box-shadow:0px 0px 5px   rgba(0,0,0,0.5);
            border-radius:3px;
            transition:all 0.5s;
        }
        .grid-item:hover{
            transform:scale(1.05);
        }
    </style>
</head>
<body>
<?php
    $number=0;
?>
<div class="container">
        <h3>Articles</h3>
        <ol>
        @foreach($datas as $data)
            <li>{{$data->title}}</li>
        @endforeach
        </ol>
    

    <h1>Details</h1>
    <div class="grid">
  
        @foreach($datas as $data)
        <div class="grid-item">
            <h3>
            {{$number=$number+1}}.
            
            {{$data->title}}</h3>
            <p>{{$data->body}}</p>
            <p class="plan-price-meal">&nbsp;</p>
           
            <hr>
            <span style="float:right;"><i>- John Wich</i></span>
        </div>
        
        @endforeach
    </div>
   </div>
</body>
</html>