@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-12 mb-3">
                <p class="h1">
                    Station {{$station->id}}: {{$station->name}}
                </p>
                <img src="/storage/{{$station->image}}" class="mw-100">
                </img>
            </div>
            @if (!is_null($station->tale))
                <p class="h2 pt-3">
                    {{$station->tale->title}}
                </p>
                <p>
                    {{$station->tale->text}}
                </p>
            @endif
            @if ($station->questions()->count() > 0)
                <p class="h2 pt-3">Quiz</p>
                <p>Klicke am Ende der Seite auf "Weiter" um zum Quiz dieser Station zu gelangen.</p>
            @endif
            @if ($map->bingos()->count() > 0)
                <p class="h2 pt-3">Bingo</p>
                <img class="pt-3" src="/storage/{{$map->bingos()->first()->image}}" style="width:100%;">
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                @if ($station->questions()->count() > 0)
                    <a href="{{$station->id}}/{{$firstquestion->id}}" class="btn btn-primary float-end me-3">Weiter zum Quiz</a>
                @else
                    @if(!is_null($nextstation))
                        <a href="{{$nextstation->id}}" class="btn btn-primary float-end me-3">Nächste Station</a>
                    @else
                        <a href="{{$station->id+1}}" class="btn btn-primary float-end me-3">Route beenden</a>
                    @endif
                @endif
            </div>
        </div>
@endsection
