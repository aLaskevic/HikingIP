@extends('layouts.adminpanel')
@section('admincontent')
<div class="content">
    <a href="/admin/map/{{$map->id}}/station/{{$station->id}}">Zurück zur Geschichtenübersicht</a>
    <a class="text-danger float-end bi-trash3" href="{{$tale->id}}/delete">Geschichte Löschen</a>
    </br>
    <div class="text-center">
        <span class="h1">{{$tale->title}}</span>
        <a class="bi-pencil-fill" href="{{$tale->id}}/edittitle"></a>

    </div>
    <a  class="bi-pencil-fill"href="{{$tale->id}}/edittext"></a>
    <div class="border text-center">
        {{$tale->text}}
    </div>
</div>
@endsection
