@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DoorInApi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <router-link class="mr-4" :to="{name: 'Home'}" exact>Accueil</router-link>
                    </li>
                </ul>
                <div class="ml-auto">
                    <router-link class="mr-4 nav-item" :to="{name: 'Login'}" exact>Connexion</router-link>
                    <router-link :to="{name: 'Register'}">S'enregistrer</router-link>
                </div>

            </div>
        </div>
    </nav>

    <div class="container mx-auto py-2">
        <router-view></router-view>
    </div>
@endsection
