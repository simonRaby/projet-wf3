@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Liste des collectes en attentes</h1>
    <table class="table table-bordered table-striped" id="users-table">
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('listcollectdata') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'partner.name', name: 'partner' },
                    { data: 'partner.address', name: 'address' },
                    { data: 'partner.ville_france.ville_nom_reel', name: 'city' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });
    </script>
@endsection
