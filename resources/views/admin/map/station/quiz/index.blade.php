@extends('layouts.adminpanel')
@section('admincontent')
    <a class="float-end bi-plus-circle" href="/admin/map/{{$map->id}}/quiz/create">Frage hinzufügen</a>
    <table class="table">
        <thead>
            <th>Frage</th>
        </thead>
        <tbody>
            @foreach($map->questions as $question)
            <tr>
                <td><a href="/admin/map/{{$map->id}}/quiz/{{$question->id}}">{{$question->question}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
