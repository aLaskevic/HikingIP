@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="edittitle"  method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">Titel: </label>

            <div class="col-md-6">
                <input value="{{$station->tale->title}}" type="text" class="form-control @error('title') is-invalid @enderror"
                    name="title" required autocomplete="current-title">

                @error('title')
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
