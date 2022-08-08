@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:100px;">
    <form action="/hike" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">
        </button>
    </form>
</div>
@endsection