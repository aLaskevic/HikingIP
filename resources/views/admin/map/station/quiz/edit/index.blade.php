@extends('layouts.adminpanel')
@section('admincontent')
<div class="content">
    <a href="/admin/map/{{$map->id}}/station/{{$station->id}}">Zurück zur Fragenübersicht</a>
    <a class="text-danger bi-trash3 float-end" href="{{$question->id}}/delete">Frage Löschen</a>
    </br>

    <div class="mt-5">
        {{$question->question}}
        <a class="bi-pencil-fill" href="{{$question->id}}/editquestion"></a>
        @if(!is_null($question->image))
        </br>
        <div>
            <img src="/storage/{{$question->image}}" style="width:20%;">
            </br>
            <a class="bi-pencil-fill" href="{{$question->id}}/editimage"></a>
        </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <th>Antwort</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($question->answers as $answer)
            <tr>
                <td><a href="{{$question->id}}/{{$answer->id}}">{{$answer->answer}}</a></td>
                @if($answer->status == true)
                <td class="text-success">Wahr</td>
                @else
                <td class="text-danger">Falsch</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="float-end" href="{{$question->id}}/create">Antwort hinzufügen</a>
</div>
</div>
@endsection
