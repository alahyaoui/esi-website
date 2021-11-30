@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($demandes) >= 1)
                    @foreach($demandes as $demande)
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <p>Par : {{$demande->student_matricule}}</p>
                                État:
                                @switch($demande->state)
                                    @case('E')
                                    <span>En cours</span>
                                    <br>
                                    <a href="/cavp/demande/accepter/{{$demande->id}}">Accepter</a>
                                    ou
                                    <a href="/cavp/demande/refuser/{{$demande->id}}">Refuser</a>
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
                            Il n'y a aucune demande en cours
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
