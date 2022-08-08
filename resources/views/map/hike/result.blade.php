@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-12 mb-5 text-center">
            <span class="h1">Quiz</span>
            <div class="col-12 pt-5 pb-3 h3">
                {{$question->question}}
            </div>
            @if(!is_null($question->image))
                </br>
                <img class="rounded pb-3" src="/storage/{{$question->image}}" style="width:30%;">
            @endif
            @foreach($question->answers as $a)
            <p>
                <input name="answer" value="{{$a->answer}}" type="submit" class="btn @if($a->status) btn-success @elseif($a == $result) btn-danger @else btn-outline-primary @endif">
            </p>
            @endforeach
            @if($result->status)
            <p class="text-success mt-3">Richtig!</p>
            @else
            <p class="text-danger mt-3">Falsch</p>
            @endif
        </div>
    </div>
        <a href="/maps/{{$map->id}}/{{$station->id}}/{{$question->id}}/next" type="submit" class="btn m-1 btn-primary float-end">Weiter</a>
</div>
@endsection
