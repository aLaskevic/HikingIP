@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="create" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="question" class="col-md-4 col-form-label text-md-end">Frage</label>

            <div class="col-md-6">
                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question">

                @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">Bild zur Frage</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

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
