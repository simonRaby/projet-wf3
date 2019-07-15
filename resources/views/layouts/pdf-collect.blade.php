<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="stylesheet">
        .left{
            float: left;
            width: 50%;
        }
        .right{
            float: right;
            width: 50%;
            text-align: right;
        }

        table{
            clear: both;
            width: 100%;
            padding-top: 100px;
            margin-bottom: 100px;
            border-collapse: collapse;
            text-align: center;
        }
        td, th{
            border: 1px solid black;
        }
        thead:before, thead:after { display: none; }
        tbody:before, tbody:after { display: none; }

    </style>

    <title>Bon de collect</title>
</head>
<body>
        <div class="container">
            <div class="head">
                <div class="left">
                    {{-- <img src="{{ asset('/storage/images/logo.png') }}" alt="logo"> --}}
                    <h2>Association Eos</h2>
                    <p><strong>Téléphone</strong><br>
                    05 00 00 00 00 <br>
                    <strong>Adresse</strong><br>
                    1 Rue Bouquière<br>
                    33000 Bordeaux</p>
                </div>
                <div class="right">
                    <h2>{{ $partnerName }}</h2>
                    <p><strong>Téléphone</strong><br>
                    {{ $partnerTel }}    <br>
                    <strong>Adresse</strong><br>
                    {{ $partnerAdress }}<br>
                    {{ $partnerCp }} {{ $partnerCity }}</p>

                </div>
            </div>
            <div class="content">
                <table>
                    <thead class="table" >
                        <tr class="row">
                            <th>#</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Genre</th>
                            <th>Couleur</th>
                            <th>Taille</th>
                            <th>Quantitée annoncé</th>
                            <th>Quantitee récupré</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($articles))
                            {{$i = 1}}
                            @foreach ($articles as $article)
                                <tr class="row">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $article['name']}}</td>
                                    <td>{{ $article['category']}}</td>
                                    <td>{{ $article['gender']}}</td>
                                    <td>{{ $article['color']}}</td>
                                    <td>{{ $article['size']}}</td>
                                    <td>{{ $article['quantity']}}</td>
                                    <td>{{ $article['quantityCollected']}}</td>
                                </tr>
                            @endforeach
                        @else
                            La collecte a été refusé
                        @endif

                    </tbody>
                </table>
            </div>
            <div>Collecté le {{ $collectedAt }} à {{ $partnerCity }}</div>
        </div>
    </body>
</html>
