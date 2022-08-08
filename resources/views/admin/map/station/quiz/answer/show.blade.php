@extends('layouts.adminpanel')
@section('admincontent')
<div class="content">
    <a href="/admin/map/{{$map->id}}/quiz/{{$question->id}}">Zurück zur Antwortenübersicht</a>
    <a class="text-danger float-end" href="/admin/map/{{$map->id}}/station/{{$station->id}}/quiz/{{$question->id}}/{{$answer->id}}/delete">Antwort Löschen</a>
    <div class="row">
        <div class="col-12 text-center">
            <p>
                Antwort: {{$question->question}}
            </p>
            Antwort: {{$answer->answer}}
            <a href="/admin/map/{{$map->id}}/station/{{$station->id}}/quiz/{{$question->id}}/{{$answer->id}}/edit" class="bi-pencil-fill"></a>
            @if($answer->status == true)
            <p class="text-success">Wahr</p>
            @else
            <p class="text-danger">Falsch</p>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
