@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <div>Änderungen für die Karte <a href="/admin/map/{{$map->id}}/">{{$map->routename}}</a></div>
    <form action="/admin/map/{{ $map->id }}/delete" enctype="multipart/form-data" method="POST">
        @csrf
        @method('DELETE')

        <div class="row mb-3">
            <label for="location" class="col-md-4 col-form-label text-md-end">Sicher dass die Route <span
                    class="text-danger">{{$map->routename}}</span> gelöscht werden soll?</label>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-6">
                    <button type="submit" class="btn btn-primary bi-trash3">
                        {{ __('Löschen') }}
                    </button>
                </div>
            </div>
    </form>
</div>

@endsection
