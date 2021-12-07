@extends('layouts.app')

@section('content')

    <h1>Mes demandes:</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($demandes) >= 1)
                    @foreach($demandes as $demande)
                        <br>
                        <div class="card">
                            <div class="card-header">
                                Demande avec état:
                                @switch($demande->state)
                                    @case('E')
                                    <span>En cours</span>
                                    @break
                                    @case('A')
                                    <span>Acceptée</span>
                                    @break
                                    @case('R')
                                    <span>Refusée</span>
                                    @break
                                    @default
                                    <span>Aucun état</span>
                                @endswitch
                            </div>
                            <div class="card-body">
                                <h5>
                                    Crée le <span>{{$demande->created_at}}</span>:
                                </h5>
                                <br>
                                <p>{{$demande->message}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <div class="card-header">
                            Vous n'avez pas de demandes
                        </div>
                        <div class="card-body">
                            <br>
                            <a href="/"> Retourner à l'accueil</a>
                        </div>
                    </div>
                @endif
                <br>
            </div>
        </div>
    </div>

@endsection
