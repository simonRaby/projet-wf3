@extends('layouts.master')

@section('content')
<div class="container home">
    <h1>Bienvenue</h1>

    <div class="row">
        <div class="col-12 col-md-8">
            <p> Surtout ne les jetez pas à la poubelle ! Ils peuvent créer des emplois et, portés par d’autres ou recyclés, commencer une deuxième vie solidaire.
            En donnant vos vêtements – mais aussi chaussures, linge de maison, petite maroquinerie, faites un petit geste pour une grande cause ; chaque sac compte ! Vous participez à la protection de l’environnement : les textiles collectés par notre association sont valorisés à 90 % et sont autant de tonnages qui ne finissent pas à la décharge ou ne sont pas incinérés. Et surtout, vous contribuez à l’insertion de personnes en difficulté, par la création d’emplois durables dans les domaines de la collecte, du tri et de la valorisation des textiles.
            Vous soutenez ainsi l’action d’une entreprise pas comme les autres, qui est mobilisée dans la lutte contre l’exclusion .</p>
        </div>
        <div class="col-12 col-md-4 image">
            <img src="{{ asset('/storage/images/home-2.jpg') }}" alt="image" >
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 image">
            <img src="{{ asset('/storage/images/home-1.jpg') }}" alt="image" >
        </div>
        <div class="col-12 col-md-8">

        <p>Nous leur offrons une seconde vie en les mettant à la disposition de nos bénéficiaires en vue d’un entretien, d’un stage ou simplement en début d’activité.
        N’hésitez pas à nous contacter par mail… même le plus petit des dons sera utile !</p>
</div>

    </div>
@endsection
