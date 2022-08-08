@extends('layouts.adminpanel')
@section('admincontent')
    <a class="float-end bi-plus-circle" href="/admin/map/create"> Route hinzufügen</a>
    <table class="table">
        <thead>
            <th><a href="/admin/map/routename">Routenname </a></th>
            <th><a href="/admin/map/location">Location </a></th>
            <th><a href="/admin/map/creator">Ersteller </a></th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($map as $m)
            <tr>
                <td><a href="/admin/map/{{$m->id}}">{{$m->routename}}</a></td>
                <td>{{$m->location}}</td>
                <td>{{$m->user->name}}</td>
                @if($m->public == 0)
                    <td class="text-danger">Offline<td>
                @else
                    <td class="text-success">Online<td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
