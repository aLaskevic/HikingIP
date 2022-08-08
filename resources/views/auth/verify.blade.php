@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-secondary">
                <div class="card-header bg-primary">{{ __('Verifiziere deine Mail Adresse') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ein neuer Verifikations-Link wurde an deine Mail-Adresse versendet.') }}
                        </div>
                    @endif


                    {{ __('Wenn du die Mail nicht erhalten hast,') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klicke hier für eine neue Mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
