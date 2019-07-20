@extends('layouts.master')

@section('content')

<div class="container">
    <form method="post" action="/AccountPartner/update">
        @csrf
        <h1>Modifier vos informations</h1>

        <div class="form-group">
            <label for="firstname">Nom</label> : <input type="text" name="firstname" id="firstname" value="{{ $users->firstname }}" />
        </div>
        <div class="form-group">
            <label for="lastname">Prenom</label> : <input type="text" name="lastname" id="lastname" value="{{ $users->lastname }}" />
        </div>
        <div class="form-group">
        <div class="form-group">
            <label for="email">Email</label> : <input type="text" name="email" id="email" value="{{ $users->email }}" />
        </div>
            <label for="name">Nom de l'entreprise</label> : <input type="text" name="name" id="name" value="{{ $partner->name }}" />
        </div>
        <div class="form-group">
            <label for="siret">Siret</label> : <input type="text" name="siret" id="siret" value="{{ $partner->siret }}" />
        </div>
        <div class="form-group">
            <label for="tel">Téléphone</label> : <input type="text" name="tel" id="tel" value="{{ $partner->tel }}" />
        </div>
        <div class="form-group">
            <label for="address">Adresse</label> : <input type="text" name="adresse" id="address" value="{{ $partner->address }}" />
        </div>

        <input type="hidden" name="userId" value="{{ $users->id }}" >

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

@endsection
