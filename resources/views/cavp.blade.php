@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('Introduire votre demande') }}</div>

                    <div class="card-body">

                        <form method="POST" id="formCAVP" action="{{ route('cavpSuccess') }}"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="cavpMessage"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Votre demande') }}</label>

                                <div class="col-md-6">
                                    <textarea id="cavpMessage"
                                              class="form-control @error('cavpMessage') is-invalid @enderror"
                                              name="message_cavp" rows="10" cols="100"
                                              placeholder="Votre demande..."></textarea>
                                </div>
                                @error('cavpMessage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Erreur</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Soumettre') }}
                                    </button>

                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
