@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:100px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="fw-bold">{{$map->routename}}</h1>
            <img class="border rounded mb-3 mw-100" src="/storage/{{$map->image}}">
            <p>
                @if($map->bingos->count() > 0)
                <span class="badge bg-secondary">Bingo</span>
                @endif
                @foreach($map->stations as $station)
                @if($station->tale)
                <span class="badge bg-secondary">Geschichte</span>
                @break
                @endif
                @endforeach
                @foreach($map->stations as $station)
                @if($station->questions->count() > 0)
                <span class="badge bg-secondary">Quiz</span>
                @break
                @endif
                @endforeach
            </p>
            <a href="/maps/{{$map->id}}/{{$start->id}}" class="btn btn-primary mb-2 bi-signpost-split">
                Wandern
            </a>
            <a href="{{$map->id}}/offline" type="button" class="btn btn-danger mb-2 bi-filetype-pdf">
                Offline-Version
            </a>
        </div>
        <div class="col-lg-6 pt-5 list-group ms-3 ms-lg-0 ps-lg-3">
            @auth
                @if($map->check(Auth::user()))
                    <span class="fw-bold text-success">Zuletzt gewandert</span>
                    <p class="list-group-item border-0 text-success">{{date('d.m.Y', strtotime($map->check(Auth::user())->pivot->created_at))}}</p>
                @endif
            @endauth
            <span class="fw-bold">Ort</span>
            <p class="pb-2 border-0 list-group-item">{{$map->location}}</p>
            <span class="fw-bold">Streckenlänge</span>
            <p class="pb-2 pt-2 border-0 list-group-item">{{$map->length}} Kilometer</p>
            <span class="fw-bold">Beschreibung</span>
            <p class="list-group-item border-0"> {{$map->description}} </p>
        </div>
    </div>
    <hr class="my-5 mx-2">
    <div class="row ">
        <div class="col-12">
            <h1 class="pt-3 fw-bold">Karte</h1>
            <iframe class="border" src="{{$map->gmap}}" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="row mt-5">
            <h2 class="fw-bold text-primary">Stationen</h2>
            @foreach($map->stations as $station)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="/storage/{{$station->image}}" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Station {{$loop->index + 1}}: {{$station->name}}</h5>

                        @if($station->tale != null) <a href="/maps/{{$map->id}}/{{$station->id}}" class="btn btn-secondary">Geschichte</a>@endif
                        @if(!$station->questions->isEmpty()) <a href="/maps/{{$map->id}}/{{$station->id}}/{{$station->questions()->first()->id}}" class="btn btn-secondary">Quiz</a>@endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
