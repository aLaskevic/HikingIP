@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="editquestion"  method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <label for="question" class="col-md-4 col-form-label text-md-end">Titel: </label>

            <div class="col-md-6">
                <input value="{{$question->question}}" type="text" class="form-control @error('question') is-invalid @enderror"
                    name="question" required autocomplete="current-question">

                @error('question')
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
