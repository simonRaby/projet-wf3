@extends('layouts.master')


@section('content')
    <div class="container-fluid est-test">
        <div class="container">
            <h1>Récapitulatif de la collecte avant validation</h1>
            <table class="table" id="tableCollect">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">catégorie</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Détails</th>
                </tr>
                </thead>
                <tbody>
                {{-- @if (isset($collect) && $collect)
                {{ $i = 0 }}
                    @foreach ( $collect['articles'] as $article)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $article['name'] }}</td>
                        <td>{{ $article['category'] }}</td>
                        <td>{{ $article['gender'] }}</td>
                        <td>{{ $article['marque'] }}</td>
                        <td><span class="caret"></span>
                            <table class="table" style="display: none;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Taille</th>
                                        <th scope="col">Couleur</th>
                                        <th scope="col">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   {{ $x = 0 }}
                                    @foreach ( $article['declinations'] as $declination)
                                        <tr>
                                            <th scope="row">{{ $x }}</th>
                                            <td>{{ $declination['size'] }}</td>
                                            <td>{{ $declination['color'] }}</td>
                                            <td>{{ $declination['quantity'] }}</td>
                                        </tr>
                                        {{ $x++ }}
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{ $i++ }}
                    @endforeach
                    </tbody>
                </table>
                @endif --}}
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="tdDropdown"><a class="btnDropdown" >
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
                            <tr>
                                <th scope="row">1</th>
                                <td>m</td>
                                <td>rouge</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>m</td>
                                <td>rouge</td>
                                <td>25</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td class="tdDropdown"><a class="btnDropdown" >
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
                            <tr>
                                <th scope="row">1</th>
                                <td>m</td>
                                <td>rouge</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>m</td>
                                <td>rouge</td>
                                <td>25</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
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
