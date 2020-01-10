@extends('layouts.master')

@section('content')
    <div class="container-fluid est-test">
        <div class="container">
            <h1>Liste des partenaires</h1>
            {{--affichage des messages de succès--}}
            @if (isset($successMessage))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $successMessage}}</strong>
                </div>
            @endif
            <table class="table table-hover text-center" id="partnerData">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>Partenaire</th>
                        <th>Responsable</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>ville</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
            </table>
            <a href="adminAddPartner" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>Ajouter un partenaire</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            let table = $('#partnerData').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('listPartnerData') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'partner.name', name: 'partner.name'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'email', name: 'email'},
                    {data: 'partner.tel', name: 'partner.tel'},
                    {data: 'partner.address', name: 'partner.address'},
                    {data: 'partner.ville_france.ville_nom_reel', name: 'partner.ville_france.ville_nom_reel'},
                    {data: 'update', name: 'update'},
                    {data: 'delete', name: 'delete'},

                ],
                columnDefs: [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": '<button type="button" id="deletePartner" style="color:#3D50CC" class="btn btn-outline-success fas fa-trash-alt "></button>'
                }, {
                    "targets": -2,
                    "data": null,
                    "defaultContent": '<button type="button" id="updatePartner" style="color:#3D50CC" class="btn btn-outline-success fas fa-edit"></button>'
                }],

                language: {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
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

            $('#partnerData tbody').on('click', '#updatePartner', function () {
                let data = table.row($(this).parents('tr')).data();
                console.log(data['id']);
                window.location.replace("editAdminPartner?id=" + data['id']);
            });

            $('#partnerData tbody').on('click', '#deletePartner', function () {
                let dataDelete = table.row($(this).parents('tr')).data();
                console.log(dataDelete['id']);
                window.location.replace("deleteAdminPartner?id=" + dataDelete['id']);
            });

        });
    </script>
@endsection
