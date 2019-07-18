@extends('layouts.master')


@section('content')
    <div class="container">
        <h1>Historique des collects</h1>

        <table class="table table-bordered table-striped" id="history-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date de création</th>
                        <th>Date de collectes</th>
                        <th>Quantité collecté</th>
                        <th>Statut</th>
                        <th>Erreur quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

@endsection


@section('script')
    <script>
        // Fonction de creation de tableau en utilisa  nt le package datatable de yajra
        $(function() {
            let table =  $('#history-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('collectHistoryData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'collected_at', name: 'quantity_collected' },
                    { data: 'quantity_collected', name: 'quantity_collected' },
                    { data: 'status.label', name: 'status.label' },
                    { data: 'is_error', name: 'is_error' },
                    { data: 'action', name: 'action' }
                ],
                columnDefs: [ {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<button class="btn btn-primary">Télécharger  en pdf</button>'
                    },
                    { targets : [5],
                    render : function (data, type, row) {
                        return data == '1' ? 'erreur' : 'Aucune'
                        }
                    }
                ],
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
            $('#history-table tbody').on( 'click', 'button', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href= "/bonCollectPdfHistory?action=download&collectId="+data['id'];
            } );

        });
    </script>
@endsection
