@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="/admin/map/{{$map->id}}/bingo/create" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">Bild: </label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    required>

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">Jahreszeit: </label>

            <div class="col-md-6">
                <select name="season" class="form-select" aria-label="Default select example">
                    <option value="sommer">Sommer</option>
                    <option value="herbst">Herbst</option>
                    <option value="winter">Winter</option>
                    <option value="frühling">Frühling</option>
                </select>
            </div>
        </div>


        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Erstellen') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection