@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('Success') }}</div>

                    <div class="card-body">

                        {{ __('Votre demande a été introduite !') }}
                        <br>
                        <a href="/"> Retourner à l'accueil</a>
                        <br>
                        <a href="/cavp/mydemandes">Voir mes demandes à la CAVP</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
