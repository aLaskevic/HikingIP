@extends('layouts.app')
@section('content')
    <style>
        .bg_image {
            background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
    <div class="bg-image bg_image text-center text-light opacity-75" style="font-family: Arial, Helvetica, sans-serif;">
        <p class="display-1 fw-bold text-secondary opacity-100" style="padding-top:25vh; ">Hiking 2.0</p>
        <hr class="bold opacity-100" style="width:25px;">
        <p class="h2 text-black opacity-100">Erleben Sie wandern ganz anders!</p>
        <button onclick="location.href='{{ url('maps') }}'"
                class="bi-signpost-split btn btn-secondary btn-lg h1 mt-3 opacity-100">Jetzt
            wandern!
        </button>
    </div>
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-md-6 pe-lg-3">
                <h2 class="fw-bold pb-3">
                    Was ist Hiking 2.0?
                </h2>
                <div class="h5 mb-5">
                    Hiking 2.0 ist ein interdisziplinäres Projekt von sieben Studierenden der Fachhochschule Aachen. Das
                    Projekt
                    hat das Ziel
                    wandern durch digitale Inhalte aufzuwerten. Kinder und Erwachsene sollen dadurch mehr Spaß am
                    Wandern
                    gewinnen können. Es gibt
                    bereits diverse Apps die bei der Routenplanung und Navigation das Wandern erleichtern. Jedoch gibt
                    es noch
                    mehr Möglichkeiten,
                    wie das Interesse der Menschen am Wandern weiter gefördert werden kann. <br>
                    Im Rahmen unseres Projektes haben wir uns darüber Gedanken gemacht und eine Wanderroute digital
                    aufgewertet.
                    Auch andere Touren können
                    so interessanter gestaltet werden. Die erste Route um den Blausteinsee dient demnach als
                    Pilot-Projekt. <br>
                    <br>
                </div>
            </div>
            <div class="col-md-6 ps-lg-5 border-start">
                <h2 class="pb-3 fw-bold">Unsere Top-Routen</h2>
                @foreach($maps as $map)
                    <div class="row mt-5 mt-md-0">
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="card-img-top" src="/storage/{{$map->image}}"
                                             alt="Bild der Route">
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h6 class="card-title text-primary fw-bold">{{$map->routename}}</h6>
                                            <p class="card-text" style="font-size: 0.8rem; margin-bottom: 0.5rem;">{{Str::limit($map->description,65)}}</p>
                                            <a href="/maps/{{$map->id}}" class="btn btn-secondary bi-signpost-split btn-sm">
                                                Jetzt wandern </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
