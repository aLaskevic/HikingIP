@extends('layouts.adminpanel')
@section('admincontent')

<div class="pb-4">
    <a href="/admin/map/{{$map->id}}/station">Zurück zur Stationsübersicht</a>
    <a class="text-danger float-end bi-trash3" href="{{$station->id}}/delete"> Station löschen</a>
</div>
<div class="row">
    <div class="col-12 h1 mb-5">
        Station
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <p>
            <span class="h2">{{$station->name}}</span>
            <a class="bi-pencil-fill"href="{{$station->id}}/editname"></a>
        </p>
        <img src="/storage/{{$station->image}}" class="borderborder-dark rounded" style="width:100%">
        <a class="float-end bi-pencil-fill" href="{{$station->id}}/editimage"></a>
    </div>
    <div class="col-lg-6">
        <p class="h3">
            Quiz-Fragen
        </p>
        <a class="float-end" href="{{$station->id}}/quiz/create">Frage hinzufügen</a> <br>
        @if($station->questions->count() == 0)
            <p class="mt-1 pt-1">Es existieren noch keine Fragen für ein Quiz.</p>
            @else
        <table class="table">
            <thead>
                <th>Frage</th>
            </thead>
            <tbody>
                @foreach($station->questions as $question)
                <tr>
                    <td>
                        <a
                            href="/admin/map/{{$map->id}}/station/{{$station->id}}/quiz/{{$question->id}}">{{$question->question}}</a>
                    <td>
                </tr>
                @endforeach
            </tbody>
        </table>
            @endif
    </div>
</div>
<div class="row pt-5">
    <div class="col-12">
        @if ($station->tale != null)
        <a class="text-danger bi-trash3" href="{{$station->id}}/deletetale">Geschichte löschen</a>
        @endif
        <p class=" h1"> Geschichte </p>
        @if($station->tale == null)
        <span>
            Es existiert noch keine Geschichte.
            <a href="{{$station->id}}/tale/create">Hier</a> kannst du eine Geschichte für die Station hinzufügen.
        </span>
        @else
        <span class="fw-bold h4">{{$station->tale->title}}</span> <a class="bi-pencil-fill" href="{{$station->id}}/edittitle"></a>
        <p>{{$station->tale->text}} <a class="bi-pencil-fill"href="{{$station->id}}/edittext"></a> </p>
        @endif
    </div>
</div>
@endsection
