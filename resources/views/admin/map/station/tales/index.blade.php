@extends('layouts.adminpanel')
@section('admincontent')
<a class="float-end bi-plus-circle" href="/admin/map/{{$map->id}}/tale/create">Geschichte hinzufügen</a>
<table class="table">
    <thead>
        <th><a href="">Titel </a></th>
    </thead>
    <tbody>
        @foreach ($station->tales as $t)
        <tr>
           <td><a href="/admin/map/{{$map->id}}/tale/{{$t->id}}">{{$t->title}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
