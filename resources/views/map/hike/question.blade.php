@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-12 text-center">
            <span class="h1">Quiz</span>
            <div class="col-12 pt-5 pb-3">
                <span class="fw-bold h3">{{$question->question}}</span>
                @if(!is_null($question->image))
                </br>
                <br>
                <img src="/storage/{{$question->image}}" style="width:30%;">
                @endif
            </div>
            <form action="/maps/{{$map->id}}/{{$station->id}}/{{$question->id}}/result" method="POST">
                @csrf
                @foreach($question->answers as $answer)
                <p>
                <input name="answer" value="{{$answer->answer}}" type="submit" class="btn btn-outline-primary">
</p>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection
