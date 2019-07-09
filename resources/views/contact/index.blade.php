@extends('layouts.master')

@section('content')
    <div class="container">
        {{-- Message en session flash si le mail c'esy bien envoyé --}}
        @if(session()->has('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endif
        {{-- formulaire d'envoie de mail --}}
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group row justify-content-md-center">
                <input type="text" class="col-6 form-control" placeholder="Prénom" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
                {{-- Si il y a une erreur dans le prenom afficher la premiere --}}
                @if($errors->has('prenom'))
                <div class="alert alert-danger col-6">
                    {{ $errors->first('prenom') }}
                </div>
                @endif
            </div>
            <div class="form-group row justify-content-md-center">
                <input type="text" class="col-6 form-control" placeholder="Nom" name="nom" id="nom" value="{{ old('nom') }}" required>
                {{-- Si il y a une erreur dans le nom afficher la premiere --}}
                @if($errors->has('nom'))
                    <strong>{{ $errors->first('nom') }}</strong>
                @endif
            </div>
            <div class="form-group row justify-content-md-center">
                <input type="text" class="col-6 form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                {{-- Si il y a une erreur dans l'email afficher la premiere --}}
                @if($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                @endif
            </div>
            @if(isset($sujet))
                <div class="form-group row justify-content-md-center">
                    <select class="custom-select col-6" id="sujet" name="sujet" required>
                        <option selected>Choisir votre sujet...</option>
                        @foreach ($sujet as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                   {{-- Si il y a une erreur dans le sujet afficher la premiere --}}
                    @if($errors->has('sujet'))
                        <strong>{{ $errors->first('sujet') }}</strong>
                    @endif
                </div>
            @endif

            <div class="form-group row justify-content-md-center">
                <textarea name="message" id="message" class="col-6 form-control" placeholder="Votre message." rows="10" required>{{ old('message') }}</textarea>
                {{-- Si il y a une erreur dans le message afficher la premiere --}}
                @if($errors->has('message'))
                    <strong>{{ $errors->first('message') }}</strong>
                @endif
            </div>
            <div class="form-group row justify-content-md-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
@endsection
