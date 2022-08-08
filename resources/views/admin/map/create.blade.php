@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="/admin/map/create" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mb-3">
            <label for="routename" class="col-md-4 col-form-label text-md-end">Streckenname: </label>

            <div class="col-md-6">
                <input id="routename" type="text" class="form-control @error('routename') is-invalid @enderror"
                    name="routename" required autocomplete="current-routename">

                @error('routename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="location" class="col-md-4 col-form-label text-md-end">Ort: </label>

            <div class="col-md-6">
                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                    name="location" required autocomplete="current-routename">

                @error('location')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="length" class="col-md-4 col-form-label text-md-end">Streckenlänge: </label>

            <div class="col-md-6">
                <input id="length" type="text" class="form-control @error('length') is-invalid @enderror" name="length"
                    autocomplete="current-length">

                @error('length')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="gmap" class="col-md-4 col-form-label text-md-end">Googlemaps Link: </label>

            <div class="col-md-6">
                <input id="gmap" type="text" class="form-control @error('gmap') is-invalid @enderror" name="gmap"
                    autocomplete="current-map">

                @error('map')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">Beschreibung: </label>

            <div class="col-md-6">
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" class="form-control" aria-label="With textarea"></textarea>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">Bild: </label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    required autocomplete="current-routename">

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
