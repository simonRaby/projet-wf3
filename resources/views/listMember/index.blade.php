@extends('layouts.master')
@section('content')

    <!--$2y$10$Ga/TyS.jj.R2LiUZcS50qOiDUYaUTPmP0W09eTOFtg7jnloc7oTKG-->
    <div class='container'>
        <div class='col-8 offset-2'>
            @if (isset($successMessage))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{$successMessage}}</strong>
                </div>
            @endif
            <h2>Membres de l'association</h2>
            <table class="table table-striped">
                <thead class="bg-success">
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
                                   class="btn btn-outline-success fas fa-edit"></a></td>
                            <td>
                                <button type="button" style="color:#3D50CC"
                                        data-memberId="{{$member->id}}"
                                        class=" deleteMember btn btn-outline-success fas fa-trash-alt"></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="adminAddMember" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>Ajouter un Membre</a>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(".deleteMember").on("click", function () {

                let deleteMember = $(this).attr('data-memberId');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: 'AjaxDeleteAdminMember?id=' + deleteMember,
                })
                    .always(function (data) {

                        let test = $('.deleteMember[data-memberId=' + data.id + ']').closest('tr').remove()
                        console.log(test);
                    })
            })

        })
    </script>
@endsection
