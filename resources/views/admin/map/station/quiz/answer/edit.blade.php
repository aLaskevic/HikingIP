@extends('layouts.adminpanel')

@section('admincontent')
<div class="card-body">
    <form action="edit" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <span class="text-center pb-3">{{$question->question}}</span>
            <label for="answer" class="col-md-4 col-form-label text-md-end">Antwort</label>

            <div class="col-md-6">
                <input id="answer" value="{{$answer->answer}}" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer"
                    autocomplete="current-map">

                @error('answer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-check col-md-6">
                    <input id="status" class="form-control @error('status') is-invalid @enderror form-check-input"
                        type="checkbox" value="1" id="flexCheckChecked" name="status" @if($answer->status == 1) checked @endif>
                    <label class="form-check-label" for="flexCheckChecked">
                        Richtige Lösung
                    </label>
                </div>
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
