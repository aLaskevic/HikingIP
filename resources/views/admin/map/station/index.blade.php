@extends('layouts.adminpanel')
@section('admincontent')
    <a href="/admin/map/{{$map->id}}">Zurück zur Karte "{{$map->routename}}"</a>
    <a class="float-end bi-plus-circle" href="station/create"> Station hinzufügen</a> <br>
    @if($map->stations->count() == 0)
        <p class="pt-3" >Es existiert noch keine Station. Erstelle <a href="station/create">hier</a> die erste Station.</p>
    @else
        <table class="table mt-5">
        <thead>
        <th>Name</th>
        </thead>
        <tbody>
        @foreach($map->stations as $station)
            <tr>
                <td>
                    <a href="station/{{$station->id}}">{{$station->name}}</a>
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    @endif
@endsection
