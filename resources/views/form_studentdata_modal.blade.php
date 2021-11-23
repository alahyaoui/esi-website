<div class="form-group row">
    <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

    <div class="col-md-6">
        <input readonly id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="first_name" value="{{ $student->first_name }}" autocomplete="Prénom" required>
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
        <input readonly id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="last_name" value="{{ $student->last_name }}" autocomplete="Nom" required>

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
        <input readonly id="bloc" type="text" class="form-control @error('bloc') is-invalid @enderror" name="bloc" value=" {{ $student->bloc }} " autocomplete="Bloc" required>

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
        <input readonly id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value=" {{ $student->section }} " autocomplete="Section" required>

        @error('bloc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


@php($count=0)

@foreach($allFiles as $file)

    @if($file->student == $student->matricule)
    
        @if($count == 0)
            <form action="{{ route('download_file', $file->file_path) }}" method="GET" role="form" id="form">
                @csrf
                <div class="form-group row">
                    <label for="cess" class="col-md-4 col-form-label text-md-right" style="pointer-events: none;">CESS</label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        @else
            <form action="{{ route('download_file', $file->file_path) }}" method="GET" role="form" id="form2">
                @csrf
                <div class="form-group row">
                    <label for="cid" class="col-md-4 col-form-label text-md-right" style="pointer-events: none;">Carte d'identité</label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        @endif

        @php($count++)

    @endif

@endforeach
