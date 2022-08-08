@extends('layouts.adminpanel')
@section('admincontent')
<div class="container">
<a href="/admin/map/{{$map->id}}/bingo">Zurück zur Bingoübersicht</a>
    <a class="float-end text-danger bi-trash3" href="/admin/map/{{$map->id}}/bingo/{{$bingo->id}}/delete"> Bingo löschen </a>
</br>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <img src="/storage/{{$bingo->image}}" style="width:100%;">
            <p class="float-start">{{$bingo->season}}</p>
            <a href="{{$bingo->id}}/edit" class="float-end bi-pencil-fill"></a>
        </div>
    </div>
</div>
@endsection
