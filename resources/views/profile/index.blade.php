@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:100px;">
        <div class="row">
            <h1>Dashboard</h1>
            <h3>Profil-Daten</h3>
            <p>
                <a class="float-end" href="profile/edit">Profil bearbeiten</a>
            </p>
            <div class="col-md-5 col-12">
                <ul class="list-group w-100">
                    <li class="list-group-item">Name: {{Auth::user()->name}}</li>
                    <li class="list-group-item">Email: {{Auth::user()->email}}</li>
                    <li class="list-group-item">Gelaufene Strecken: {{$mapcount}}</li>
                    <li class="list-group-item">Gelaufene Kilometer: {{$length}}</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <h3 class="mb-3 mt-5">Gelaufene Strecken</h3>
                    <div class="list-group">
                        <!-- Schleife über alle gelaufenen Routen - max 4 -->
                        @if($lastmaps->count() > 0)
                            @foreach($lastmaps as $map)
                                <a href="/maps/{{$map->id}}" class="list-group-item list-group-item-action"
                                   aria-current="true">
                                    <!-- Link zur Route -->
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-primary">{{$map->routename}}</h5>
                                        <small>{{$map->length}} km</small>
                                    </div>
                                    <p class="mb-1 text-secondary">{{Str::limit($map->description,100) }}</p>
                                    <small>{{date('d.m.Y', strtotime($map->pivot->created_at))}}</small>
                                </a>
                            @endforeach
                        @else
                            Laufen sie jetzt Ihre erste Strecke!
                        @endif
                    </div>
                    <button onclick="location.href='{{ url('maps') }}'"
                            class="bi-signpost-split btn btn-secondary btn-lg h1 mt-3 opacity-100">Jetzt weitere
                        Strecken
                        wandern!
                    </button>
                </div>
                <div class="col-md-5 mt-md-3 ms-md-5 mt-5 ">
                    <h3 class="mb-3 mt-5">Erreiche deine 100 km</h3>
                    <div class="progress" style="height: 25px;">
                        <div class="progress-bar" role="progressbar" style="width: {{$length}}%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100">{{$length}}%
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2 mt-5 pt-5">
                <h3 class="mb-3">Für dich empfohlene Routen</h3>
                <!-- mit Schleife über alle vorhandenen Routen iterieren - max 3-->
                @foreach($recommendedmaps as $map)
                    <div class="col-md-4 mt-lg-4 mt-2">
                        <div class="card">
                            <img class="card-img-top" src="/storage/{{$map->image}}" alt="Bild der Route">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{$map->routename}}</h5>
                                <p class="card-text">{{Str::limit($map->description,150)}}
                                </p>
                                <a href="#" class="btn btn-secondary"> Jetzt wandern</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
