@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
<form action="/profile/edit/password" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="oldpassword" class="col-md-4 col-form-label text-md-end">Altes Passwort: </label>

            <div class="col-md-6">
                <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword"
                    required>

                @error('oldpassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="newpassword" class="col-md-4 col-form-label text-md-end">Neues Passwort: </label>

            <div class="col-md-6">
                <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword"
                    required>

                @error('newpassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="newpassword" class="col-md-4 col-form-label text-md-end">Wiederhole das neue Passwort: </label>

            <div class="col-md-6">
                <input type="password" class="form-control @error('image') is-invalid @enderror" name="newpassword_confirmation"
                    required>
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
