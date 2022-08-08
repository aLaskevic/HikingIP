@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="/admin/map/{{$map->id}}/station/{{$station->id}}/tale/create" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">Titel der Geschichte</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    autocomplete="current-map">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="text" class="col-md-4 col-form-label text-md-end">Geschichte </label>

            <div class="col-md-6">
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror" class="form-control" aria-label="With textarea"></textarea>

                @error('text')
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
