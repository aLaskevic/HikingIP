@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
<div>Änderungen für die Karte <a href="/admin/map/{{$map->id}}/">{{$map->routename}}</a></div>
    <form action="/admin/map/{{ $map->id }}/editlength" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="length" class="col-md-4 col-form-label text-md-end">Streckenlänge: </label>

            <div class="col-md-6">
                <input value="{{$map->length}}" type="number" class="form-control @error('length') is-invalid @enderror"
                    name="length" required autocomplete="current-routename">

                @error('routename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aktualisieren') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
