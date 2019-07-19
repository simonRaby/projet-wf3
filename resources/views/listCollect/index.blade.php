@extends('layouts.master')

@section('content')
<div class="container-fluid est-test">
    <div class="container">
        <h1>Liste des collectes en attente</h1>
        {{-- Message en session flash si le mail c'esy bien envoyé --}}
        @if(session()->has('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
                <p>Télécharger le bon de collecte au format pdf</p>
                <a href="/bonCollectPdf?action=download&collectId={{ session('collectId') }}" class="btn btn-primary">Télécharger</a>
            </div>
        @endif
        <table class="table table-hover text-center" id="collects-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Partenaire</th>
                    <th>Adresse</th>
                    <th>ville</th>
                    <th>Quantité</th>
                    <th>Créé le</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script>
        // Fonction de creation de tableau en utilisant  nt le package datatable de yajra
        $(function() {
            let table =  $('#collects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('listcollectdata') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'partner.name', name: 'partner.name' },
                    { data: 'partner.address', name: 'partner.address' },
                    { data: 'partner.ville_france.ville_nom_reel', name: 'partner.ville_france.ville_nom_reel' },
                    { data: 'quantity', name: 'quantity' },
                        { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ],
                columnDefs: [ {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<button class="btn btn-primary">Détails avant Validation</button>'
                    } ],
                language: {
                        "sProcessing":     "Traitement en cours...",
                        "sSearch":         "Rechercher&nbsp;:",
                        "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                        "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                        "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "sInfoPostFix":    "",
                        "sLoadingRecords": "Chargement en cours...",
                        "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                        "oPaginate": {
                            "sFirst":      "Premier",
                            "sPrevious":   "Pr&eacute;c&eacute;dent",
                            "sNext":       "Suivant",
                            "sLast":       "Dernier"
                        },
                        "oAria": {
                            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                            "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        },
                        "select": {
                                "rows": {
                                    _: "%d lignes séléctionnées",
                                    0: "Aucune ligne séléctionnée",
                                    1: "1 ligne séléctionnée"
                                }
                        }
                    }
            });
            // fonction de redirection on click avec l'id de la collect passé en get
            $('#collects-table tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                window.location.replace("/validateCollect?id="+data['id']);
            } );

        });
    </script>
@endsection
