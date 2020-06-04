@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="errors" class="alert alert-danger d-none" role="alert"></div>
                <form id="form">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail utilisateur</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <button class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <h2>Tableau qui affiche les nouveaux ajouts en Fetch</h2>
                <p>C'est dans ce tableau qu'on affichera dynamiquement le retour du Fetch.</p>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <h2>Tableau global</h2>
                <p>Ce tableau reprend toutes les inscriptions avec une pagination.</p>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts-footer')
    <script>
        // On attend le chargement du document
        document.addEventListener("DOMContentLoaded", function () {
            (function () {
                "use strict";
                // Ici le JS pour le Fetch (SANS JQUERY)
                let form = document.querySelector('#form');

                form.addEventListener('submit', function (e) {
                    // Au cas où si le preventDefault ne fonctionne pas (ex:IE10)
                    e.preventDefault() ? e.preventDefault() : (e.returnValue = false);

                    // On récupère le token sinon erreur 419
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // On récupère les valeurs
                    let email = document.querySelector('#email').value;
                    let name = document.querySelector('#name').value;
                    let password = document.querySelector('#password').value;

                    // On récupère la div error
                    let errorElement = document.querySelector('#errors');

                    // On récupère le tableau
                    let table = document.querySelector('#tableBody');

                });
            })(); // Fin de mon script
        });
    </script>
@endsection
