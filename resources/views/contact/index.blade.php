@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Nous joindre</h2>
                 {{-- Message en session flash si le mail c'esy bien envoyé --}}
                @if(session()->has('successMessage'))
                    <div class="alert alert-success">
                        {{ session('successMessage') }}
                    </div>
                @endif
                {{-- formulaire d'envoie de mail --}}
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" value="{{ old('prenom') }}" required>
                        {{-- Si il y a une erreur dans le prenom afficher la premiere --}}
                        @if($errors->has('prenom'))
                        <div class="alert alert-danger col-6">
                            {{ $errors->first('prenom') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" value="{{ old('nom') }}" required>
                        {{-- Si il y a une erreur dans le nom afficher la premiere --}}
                        @if($errors->has('nom'))
                            <strong>{{ $errors->first('nom') }}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                        {{-- Si il y a une erreur dans l'email afficher la premiere --}}
                        @if($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                    </div>
                    @if(isset($sujet))
                        <div class="form-group">
                            <select class="custom-select" id="sujet" name="sujet" required>
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

                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" placeholder="Votre message." rows="10" required>{{ old('message') }}</textarea>
                        {{-- Si il y a une erreur dans le message afficher la premiere --}}
                        @if($errors->has('message'))
                            <strong>{{ $errors->first('message') }}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="col-6 text-right">
                <h2>Nous trouver</h2>
                <h3>Adresse</h3>
                <p>1 Rue Bouquière<br>
                33000 Bordeaux</p>
                <h3>Nous sommes ouvert</h3>
                <p>Du Mardi au samedi.</p>
                <p>De 10h à 12h30 et 13h30 à 19h</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d707.313223096162!2d-0.5719484707415151!3d44.836782949695525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5527cf1039b077%3A0x3b282a7a2fc00496!2s1+Rue+Bouqui%C3%A8re%2C+33000+Bordeaux!5e0!3m2!1sfr!2sfr!4v1562747392345!5m2!1sfr!2sfr" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

    </div>
@endsection
