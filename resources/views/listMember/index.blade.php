@extends('layout.master')
@section('content')
    @if (Session::get('successMessage'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('successMessage')}}</strong>
        </div>
    @endif
    <div class='container'>
        <div class='col-8 offset-2'>
            <h2>Membres de l'association</h2>
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($members))
                    @foreach($members as $member)
                        <tr>
                            <td>{{$member->firstname}}</td>
                            <td>{{$member->lastname}}</td>
                            <td>{{$member->email}}</td>
                            <td><a href="updateAdminMember?id={{$member->id}}" style="color:#3D50CC"
                                   class="fas fa-edit"></a></td>
                            <td><a href="#" style="color:#3D50CC" id="{{$member->id}}"
                                   class="deleteMember fas fa-trash-alt"></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(".deleteMember").on("click", function () {

                let deleteMember = $(this).attr('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: 'AjaxDeleteAdminMember?id='+ deleteMember,
                })
            })

        })
    </script>
@endsection
