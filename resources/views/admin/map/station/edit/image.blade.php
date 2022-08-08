@extends('layouts.adminpanel')
@section('admincontent')
<div class="card-body">
<div>Änderungen für die Karte <a href="/admin/map/{{$map->id}}/">{{$map->routename}}</a></div>
    <form action="editimage" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">Bild: </label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"required>

                @error('image')
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
