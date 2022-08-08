@extends('layouts.adminpanel')
@section('admincontent')
<style>
.add {
    transition: background 0.3s;
    background: rgba(0, 0, 0, .0)
        /*  10% opaque green */
}

.add:hover {
    background: rgba(0, 0, 0, .1)
        /*  10% opaque green */
}
</style>
<div class="container">
    <a href="/admin/map/{{$map->id}}">Zurück zur Karte "{{$map->routename}}"</a>
    <div class="row pb-4">
        <div class="col-12 h1">
            Bingo
        </div>
    </div>
    @if($map->bingos->count() == 0)
    <div class="row">
        <div class="col-12">
            Es existiert noch kein Bingo. Erstelle <a href="bingo/create">hier</a> das erste Bingo.
        </div>
    </div>
    @else
    <div>
        <div class="row">
            @foreach($map->bingos as $bingo)
            <div class="col-lg-3 col-md-6 item">
                <a href="bingo/{{$bingo->id}}">
                    <img src="/storage/{{$bingo->image}}" class="rounded" style="width:100%;">
                    <p class="text-center pt-2">{{$bingo->season}}</p>
                </a>
            </div>
            @endforeach
            <a class="col-3 text-center pt-4 add mb-3 rounded" href="bingo/create">
                    <p class="display-6">+</p>
                    <span>Neues Bingo</span>
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
