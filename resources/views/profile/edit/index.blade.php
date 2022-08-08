@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
    <p>Nutzername: {{Auth::user()->name}}</p>
    <p>E-mail: {{Auth::user()->email}} </p>
    <p>Passwort: ********** <a class="bi-pencil-fill" href="/profile/edit/password"></a></p>
</div>
@endsection
