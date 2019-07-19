@extends('layouts.master')


@section('content')
    <div class="container-fluid est-test">
        <table class="table table-hover text-center" id="tableCollect">
        <div class="container">
            <h1>Récapitulatif de la collecte avant validation</h1>
                <?php $i=0; ?>
                    @foreach ( $collect as $article)

            <tbody>
                @if (isset($collect) && $collect)
            </thead>
              </tr>
                <th scope="col">Marque</th>
                <th scope="col">Détails</th>
                <th scope="col">Genre</th>
                <th scope="col">catégorie</th>
                <th scope="col">Nom</th>
                <th scope="col">#</th>
              <tr>
            <thead>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $article['name'] }}</td>
                        <td>{{ $article['category'] }}</td>
                        <td>{{ $article['gender'] }}</td>
                        <td>{{ $article['marque'] }}</td>
                        <td class="tdDropdown">
                            <a class="btnDropdown" >
                                Plus de détails &darr;
                            </a>
                            <table class="table tableDropdown table-sm ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Taille</th>
                                        <th scope="col">Couleur</th>
                                        <th scope="col">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $x=0; ?>
                                    @foreach ( $article['declinations'] as $declination)
                                        <tr>
                                            <th scope="row">{{ $x }}</th>
                                            <td>{{ $declination['size'] }}</td>
                                            <td>{{ $declination['color'] }}</td>
                                            <td>{{ $declination['quantity'] }}</td>
                                        </tr>
                                        <?php $x++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach

                @else
                    <tr>Aucune collecte en cours</tr>
                @endif
            </tbody>
        </table>
        <a href="/recapCollectValidate" class="btn btn-primary">Valider</a>
        <a href="/recapCollectCancel" class="btn btn-primary">Annuler</a>
    </div>

@endsection

@section('script')
    <script>
        $(function() {

            $('#tableCollect').on('click', '.btnDropdown', function(){

                $(this).next('.tableDropdown').toggle();

            })
        });
    </script>
@endsection
