@extends('layouts.master')

@section('content')
    <div class="container about">
        <h1>A propos de l'association</h1>
        <h2>Pourquoi donner?</h2>
        <div class="image container-fluid">
            <img src="{{ asset('/storage/images/image_2.jpg') }}" alt="image">
        </div>
        <p>Vous êtes une enseigne de la grande distribution, un réseau de franchises, une boutique indépendante... Vous souhaitez agir pour l'insertion de personnes en situation d'éxclusion  et contribuer a la protection de l'environnement, tout en associant vos clients et en dynamisant votre point de ventes</p>
        <h2>Comment donner?</h2>
        <div class="image container-fluid">
            <img src="{{ asset('/storage/images/image_4.jpg') }}" alt="image">
        </div>
        <p>Une fois enrigistré et connecté a notre site il vous suffit simplement de remplir un formulaire contenant les informations des articles invendu. Un de nos transporteur viendras dans les plus bref delais vérifier et récuperer les articles directement a votre magasin.</p>
        <h2>Ou vont vos dons?</h2>
        <div class="image container-fluid">
            <img src="{{ asset('/storage/images/image_3.jpg') }}" alt="image">
        </div>
        <p>ils seront distribuer principalement au personne dans le besoin  en vue d’un entretien, d’un stage ou simplement en début d’activité.</p>
        <h2>Qui sommes nous?</h2>
        <div class="image container-fluid">
            <img src="{{ asset('/storage/images/image_1.jpg') }}" alt="image">
        </div>
        <p>Nous sommes une associations qui a pour objectif de limiter les dechets généré par notre société de consommation capitaliste. Et par la même occasion faire bénéficier les personnes dans le besoins.</p>
    </div>

@endsection
