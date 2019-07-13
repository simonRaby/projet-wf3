<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bon de collect</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col_6">
                    <h2>Association Eos</h2>
                    <h3>Téléphone</h3>
                    <p>05 00 00 00 00</p>
                    <h3>Adresse</h3>
                    <p>1 Rue Bouquière<br>
                    33000 Bordeaux</p>
                </div>
                <div class="col_6">
                    <h2>{{ $collect['partnerName'] }}</h2>
                    <h3>Téléphone</h3>
                    <p>{{ $collect['partnerTel'] }}</p>
                    <h3>Adresse</h3>
                    <p>{{ $collect['partnerAdress'] }}<br>
                    {{ $collect['partnerCp'] }} {{ $collect['partnerCity'] }}</p>

                </div>
                <div class="row">
                    <table>
                        <thead class="table table-sm" >
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Couleur</th>
                            <th scope="col">Taille</th>
                            <th scope="col">Quantitée annoncé</th>
                            <th scope="col">Quantitee récupré</th>
                        </thead>
                        <tbody>
                            @if ($collect['articles'])
                                @foreach ($collect['articles'] as $article)
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $article['name']}}</td>
                                    <td>{{ $article['category']}}</td>
                                    <td>{{ $article['gender']}}</td>
                                    <td>{{ $article['color']}}</td>
                                    <td>{{ $article['size']}}</td>
                                    <td>{{ $article['quantity']}}</td>
                                    <td>{{ $article['quantityCollected']}}</td>
                                @endforeach
                            @else
                                La collecte a été refusé
                            @endif

                        </tbody>
                    </table>
                </div>
            <div>Collecté le {{ $collect['collectedAt'] }}</div>
            </div>
        </div></body>
</html>
