@extends('layouts.adminpanel')
@section('admincontent')
<div class="container">
    <a href="/admin/map/">Zurück zur Kartenübersicht</a>
    <a class="float-end text-danger bi-trash3" href="/admin/map/{{$map->id}}/delete"> Route löschen </a>
    <div class="col-12 center pb-5 pt-4">
        <span class="h1">{{$map->routename}}</span>
        <a class="ps-3 bi-pencil-fill" href="/admin/map/{{$map->id}}/editname"></a>
        <img class="border rounded" src="/storage/{{$map->image}}" style="width:100%; ">
        <a class="float-end bi-pencil-fill" href="/admin/map/{{$map->id}}/editimage"></a>
    </div>

    <div class="list-group">
        <span class="pe-2">Status </span>
        <p class="pb-2 list-group-item">
            @if($map->public == false)
            <span class="text-danger">Offline</span>
            @else
            <span class="text-success">Online</span>
            @endif
        </p>
        <div class="d-flex">
            <span class="pe-2">Location </span>
            <a class="bi-pencil-fill"href="/admin/map/{{$map->id}}/editlocation"></a>
        </div>

        <p class="pb-2 list-group-item">{{$map->location}}</p>
        <div class="d-flex">
            <span class="pe-2">Streckenlänge </span>
            <a class="bi-pencil-fill" href="/admin/map/{{$map->id}}/editlength"></a>
        </div>
        <p class="pb-2 pt-2 list-group-item">{{$map->length}} Kilometer</p>
        <div class="d-flex">
            <span class="pe-2">Beschreibung </span>
            <a class="bi-pencil-fill"href="/admin/map/{{$map->id}}/editdescription"></a>
        </div>
        <p class="list-group-item"> {{$map->description}}</p>
    </div>

    <div class="col-3">
        <button onclick="location.href='{{url('admin/map/'.$map->id.'/station')}}'" type="button"
            class="btn btn-primary">
            Stationen
        </button>
        <button onclick="location.href='{{url('admin/map/'.$map->id.'/bingo')}}'" type="button"
            class="btn btn-primary">
            Bingo
        </button>
    </div>
    <hr class="m-5">
    <div class="row ">
        <div class="col-12">
            <div class="d-flex">
                <h1 class="pt-3 fw-bold">Karte</h1>
                <a class="pt-4 ps-2 bi-pencil-fill" href="/admin/map/{{$map->id}}/editgmap"></a>
            </div>
            <iframe class="border" src="{{$map->gmap}}" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="d-flex justify-content-center pt-4">
        @if($map->public == 0)
        <form action="{{$map->id}}/publish" method="POST">
        @csrf
        @method('PATCH')
            <button type="submit" class="btn btn-success" @if($map->stations->count() <= 0) disabled @endif>
                    Veröffentlichen
            </button>
        </form>
        @else
        <form action="{{$map->id}}/hide" method="POST">
        @csrf
        @method('PATCH')
            <button type="submit" class="btn btn-danger">
                    Verstecken
            </button>
        </form>
        @endif
    </div>

</div>
@endsection
