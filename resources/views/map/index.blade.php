@extends('layouts.app')
@section('content')
<style>
.item{
    transition: opacity 0.2s;
}
.item:hover {
     opacity:0.95;        /*  10% opaque green */
}
</style>
<div class="container" style="padding-top:100px;">
    <h2 class="text-center mb-4">Finde jetzt deine digitale Reise!</h2>
    <form method="get" action="/maps/search" class="form-outlin d-flex justify-content-center">
        <input type="search" name="search" style="width:50%;" class="me-1 form-control">
        <input type="button" value="Suchen" class="btn btn-primary">
    </form>
    <p class="text-center pt-2 pb-5"><a href="#">Erweiterte Suche</a></p>
    <div class="row justify-content-start pb-4" data-mdb-ripple-color="light">
        @foreach($map as $m)
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 item">
                <a class="text-decoration-none text-dark"  href="/maps/{{$m->id}}">
                    <img src="/storage/{{ $m->image }}" class="rounded w-100 item">
                    <div class="card-body">
                        <div class="font-weight-bold ps-2 pt-2">
                            <div class="d-inline h5 text-primary fw-bold">{{ $m->routename }} </div>
                            <div class="d-inline float-end">{{$m->length}} Km</div>
                            </br>
                            <div class="d-inline">Ort: {{$m->location}}</div>
                            @auth
                            @if($m->check(Auth::user()))
                            <div class="d-inline text-success float-end">✔</div>
                            @endif
                            @endauth
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @if($map->count() == 0)
        <p class="text-center">Es wurde keine Karte gefunden. <a class="d-inline" href="/maps">Hier</a> kannst du die Suche zurücksetzen.</p>
        @endif
    </div>
</div>
@endsection
