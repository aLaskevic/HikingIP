@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
<form action="edittext" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="text" class="col-md-4 col-form-label text-md-end">Geschichte </label>

            <div class="col-md-6">
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror" class="form-control" aria-label="With textarea">{{$station->tale->text}}</textarea>

                @error('text')
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
