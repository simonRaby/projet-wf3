@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Liste des collectes en attentes</h1>
    <table class="table table-bordered table-striped" id="collects-table">
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
@endsection

@section('script')
    <script>
        $(function() {
            let table =  $('#collects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('listcollectdata') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'partner.name', name: 'partner' },
                    { data: 'partner.address', name: 'address' },
                    { data: 'partner.ville_france.ville_nom_reel', name: 'city' },
                    { data: 'quantity', name: 'quantity' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actiob', name: 'action' }
                ],
                columnDefs: [ {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<button class="btn btn-primary">Valider</button>'
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

            $('#collects-table tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                console.log( data['id']);
                window.location.replace("/validate-collect?id="+data['id']);
            } );

        });
    </script>
@endsection
