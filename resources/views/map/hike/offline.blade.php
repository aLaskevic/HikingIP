<html>
<header>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="{{public_path('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            font-size: 0.75rem;
        }
    </style>
</header>
<body>
<!-- Offline-PDF -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="fw-bold">{{$map->routename}}</h1>
            <img src="{{ public_path("storage/".$map->image) }}" alt="" style="max-height: 250px; max-width:550px;">
        </div>
        <div class="col list-group ms-3 ms-lg-0 ps-lg-3 mt-1">
            <span class="fw-bold">Ort</span>
            <p class="border-0 list-group-item">{{$map->location}}</p>
            <span class="fw-bold">Streckenlänge</span>
            <p class="border-0 list-group-item">{{$map->length}} Kilometer</p>
            <span class="fw-bold">Beschreibung</span>
            <p class="list-group-item border-0"> {{$map->description}}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <h2 class="fw-bold">Stationen</h2>
            @foreach($map->stations as $station)
                <div class="card w-75 mb-4">
                    <img src="{{ public_path("storage/".$station->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Station {{$loop->index + 1}}: {{$station->name}}</h5>
                    </div>
                </div>
                @if($station->tale != null)
                    <h3 class="mt-2">Geschichte</h3>
                    <p class="fw-bold pt-3">
                        {{$station->tale->title}}
                    </p>
                    <p>
                        {{$station->tale->text}}
                    </p>
                @endif
                @if(!$station->questions->isEmpty())<!-- Fragen pro Station -->
                <h3 class="mt-2">Quiz</h3>
                @foreach($station->questions as $questions)
                    <span>Frage {{$loop->index + 1}} : {{$questions->question}}</span> <br>
                    @if(!is_null($questions->image))
                        <br>
                        <img src="{{public_path("storage/".$questions->image)}}" style="width:30%;">
                        <br>
                    @endif
                    @foreach($questions->answers as $answer)
                        <span class="border mt-2 mt-1 p-1">{{$answer->answer}}</span>
                    @endforeach
                    <br> <br>
                @endforeach
                <span class="fw-bold">Lösungen</span> <br> <!-- Richtige Antworten -->
                @foreach($station->questions as $questions)
                    @foreach($questions->answers as $answer)
                        @if($answer->status == true)
                            <span>{{$questions->question}} - {{$answer->answer}}</span> <br>
                        @endif
                    @endforeach
                @endforeach
                @endif
            @endforeach
            @if ($map->bingos()->count() > 0)
                <h2 class="pt-3">Bingo</h2>
                <img class="pt-3" src="{{public_path("storage/".$map->bingos()->first()->image)}}"
                     style="max-height:250px; max-width:550px;">
            @endif
        </div>
    </div>
</div>
</body>
</html>
