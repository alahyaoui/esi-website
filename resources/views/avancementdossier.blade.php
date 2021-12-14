@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Statut</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <span>Votre inscription est</span>
                    @switch($insc->state)
                        @case('E')
                        <span>en cours de validation</span>
                        @break
                        @case('V')
                        <span>acceptée</span>
                        @break
                        @case('R')
                        <span>refusée</span>
                        <p>Cause du refus : {{ $insc->message_refus }}</p>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>

@endsection