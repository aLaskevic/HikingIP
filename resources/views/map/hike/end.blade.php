@extends('layouts.app')
@section('content')
<div class="container mt-5">
   <div class="row">
       <div class="col-12">
           <h1 class="bi-signpost-split">Herzlichen Glückwunsch!</h1>
           <h2>Sie haben die Route erfolgreich beendet.</h2>
           <span>Sie sind {{$map->length}} Kilometer gewandert!</span>
       </div>
       <div class="col-12 mt-4 mb-5">
           <span class="fw-bold"> Möchten Sie noch eine weitere Strecke wandern? </span>
       </div>
       <h4 class="pb-2">Unsere Top-Routen</h4>
       <!-- mit Schleife über alle vorhandenen Routen iterieren -->
       <div class="row mt-5 mt-md-0">
       @foreach($maps as $map)
           <div class="col-lg-4 col-md-6 mb-4 ">
               <div class="card">
                   <img class="card-img-top" src="/storage/{{$map->image}}" alt="Bild der Route">
                   <div class="card-body">
                       <h5 class="card-title text-primary">{{$map->routename}}</h5>
                       <p class="card-text">{{Str::limit($map->description,100)}}</p>
                       <a href="/maps/{{$map->id}}" class="btn btn-secondary bi-signpost-split">Jetzt wandern </a>
                   </div>
               </div>
           </div>
        @endforeach
   </div>
</div>
@endsection
