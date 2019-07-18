@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <h1>Liste des Articles</h1>
            {{-- Message en session flash si le mail c'esy bien envoyé --}}
            @if(session()->has('successMessage'))
                <div class="alert alert-success">
                    {{ session('successMessage') }}
                </div>
            @endif
            <table class="table table-bordered table-striped" id="articles-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Categorie</th>
                    <th>Marque</th>
                    <th>Genre</th>
                    <th>Taille</th>
                    <th>Couleur </th>
                    <th>Emplacement</th>
                    <th>QrCode</th>
                    <th>More</th>
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
            let table =  $('#articles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('listarticledata') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'a_name', name: 'a_name' },
                    { data: 'c_name', name: 'c_name' },
                    { data: 'm_label', name: 'm_label' },
                    { data: 'g_label', name: 'g_label' },
                    { data: 's_label', name: 's_label' },
                    { data: 'c_label', name: 'c_label' },
                    { data: 'r_label', name: 'r_label' },
                    { data: 'qr_code', name: 'qr_code' },
                    { data: 'action', name: 'action' },

                ],
                columnDefs: [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": '<button class="btn btn-primary">En Savoir Plus</button>'
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
            $('#articles-table tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                window.location.replace("/article?id="+data['id']);
            } );

        });
    </script>
@endsection
