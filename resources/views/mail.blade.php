<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{dd($body)}} --}}
    <p>
        Hi,
        <b>{{$name}}</b>
    </p>
    <p>
        We have great news for you, our newest movie has just arrived. What are you waiting for? Let's check it right away
    </p>

    <br>

    <div class="border">
        <img src="{{$movie->banner_url}}" alt="" style="width:500px">
        <h1>{{$movie->title}}</h1>
        <p>Duration: {{$movie->duration}}</p>
        <p>Rating: {{$movie->rating}}</p>
        <p>Synopsis: <br> {{$movie->synopsis}}</p>
    </div>

    <p>Sincerely, <br> Cinemov</p>
</body>
</html>
