@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Validation de la collecte</h1>
    @isset($articles)
    <h2>Détails</h2>
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col">Nom</div>
                <div class="col">Catégorie</div>
                <div class="col">Genre</div>
                <div class="col">Couleur</div>
                <div class="col">Taille</div>
                <div class="col">Quantité</div>
                <div class="col">Action</div>
            </div>
            @foreach ($articles as $article)
            <div class="row">
                <div class="col">{{ $article['name']}}</div>
                <div class="col">{{ $article['categorie']}}</div>
                <div class="col">{{ $article['gender']}}</div>
                <div class="col">{{ $article['color']}}</div>
                <div class="col">{{ $article['size']}}</div>
                <div class="col"><input type="number" name="quantityCollected[{{ $article['id'] }}]" value="{{ $article['quantity'] }}"></div>
                <div class="col">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="rejectedSwitch{{ $article['id'] }}" name='rejected[{{ $article['id'] }}]'>
                        <label class="custom-control-label" for="rejectedSwitch{{ $article['id'] }}">Rejeter cette article</label>
                    </div>
                </div>
                <input type="hidden" name="quantity[{{ $article['id'] }}]" value="{{ $article['quantity'] }}">
            </div>
            @endforeach
            <input type="hidden" name="collectId" value="{{ $id }}">
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    @endisset
</div>
@endsection
