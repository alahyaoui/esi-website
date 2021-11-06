@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Upload Validation Error<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('storeStudent') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autocomplete="Prénom" required>
                                <div class="valid-feedback">
                                    Correct!
                                </div>
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" autocomplete="Nom" required>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bloc" class="col-md-4 col-form-label text-md-right">{{ __('Bloc') }}</label>

                            <div class="col-md-6">
                                <input readonly id="bloc" type="text" class="form-control @error('bloc') is-invalid @enderror" name="bloc" value="1" autocomplete="Bloc" required>

                                @error('bloc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>

                            <div class="col-md-6">
                                <select for="section" class="col-md-9 col-form-select text-md-center">
                                    <option value="gestion">Informatique de gestion</option>
                                    <option value="reseau">Informatique et systèmes - orientation réseaux et télécommunications</option>
                                    <option value="industrielle">Informatique et systèmes - orientation informatique industrielle</option>
                                </select>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cess" class="col-md-4 col-form-label text-md-right" style="pointer-events: none;">CESS</label>
                            <div class="col-md-6">
                                <input id="cess" type="file" class="form-control-file" name="select_file" accept=".pdf,.png,.jpg,.jpeg
                                " required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cess" class="col-md-4 col-form-label text-md-right" style="pointer-events: none;">Carte d'identité</label>
                            <div class="col-md-6">
                                <input id="cess" type="file" class="form-control-file" name="select_file" accept=".pdf,.png,.jpg,.jpeg" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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