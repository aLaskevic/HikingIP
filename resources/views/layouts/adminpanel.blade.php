@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-lg-2">
            <div class="card position-sticky border-secondary">
                <div class="card-header bg-primary">Menü</div>
                <a class="p-lg-5 p-3 text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" href="/admin">Home</a>
                <a class="p-lg-5 p-3 text-secondary" href="/admin/map">Karten</a>
            </div>
        </div>
        <div class="col-lg-10 mt-lg-0 mt-5">

            @yield('admincontent')

        </div>
    </div>
</div>
    @endsection
