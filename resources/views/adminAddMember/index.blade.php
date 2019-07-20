{{--Formulaire d"ajout de membre--}}
@extends("layouts.master")
@section("content")
    <div class="container text-center">
        <div class="col-5 offset-3">
            @if(isset($edit))
                <h2>Modifier les informations d'un membre</h2>
            @else
                <h2>Ajouter un membre</h2>
            @endif
            <form method="POST" action="{{isset($edit)?"updateAdminMember":"adminAddMember"}}"
                  name="{{isset($edit)?"updateMember":"addMember"}}">{{csrf_field()}}

                <div class="form-group">
                    <label for="lastName">Nom</label><br>
                    <input class="form-control" value="{{isset($edit)? $edit-> lastname:old('lastName')}}"
                           type="text" name="lastName"
                           required>
                    {{--affichage des messages d'erreurs--}}
                    @if($errors->has('lastName'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('lastName')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="firstName">Prénom</label><br>
                    <input class="form-control" type="text"
                           name="firstName" value="{{isset($edit)? $edit-> firstname:old('firstName')}}" required>
                    @if($errors->has('firstName'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('firstName')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input class="form-control" type="email" name="email"
                           value="{{isset($edit)? $edit-> email:old('email')}}" required>
                    @if($errors->has('email'))
                        <div role="alert" class="alert alert-danger">
                            <strong>{{$errors->first('email')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    @if(isset($edit))
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="editPassword" class="custom-control-input editPassword"
                                   id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Modifier le mot de passe
                                ?</label>
                        </div>
                        <div class="form-group" id="passwordUpdate" style="display:none;">
                            <input type="password" id="passwordMember" class="form-control" name="passwordMember"
                                   placeholder="Nouveau mot de passe, 6 caractères requis" required disabled>
                            <small>
                                <strong>Veuillez inclure un caractère spécial, une majuscule ainsi qu'une
                                    minuscule.</strong>
                            </small>
                        </div>
                    @else
                        <label for="passwordMember">Mot de passe attribué</label><br>
                        <input class="form-control" type="password"
                               name="passwordMember" placeholder="6 caractères requis" required>
                        <small>
                            <strong>Veuillez inclure un caractère spécial, une majuscule ainsi qu'une
                                minuscule.</strong>
                        </small>
                        @if($errors->has('passwordMember'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$errors->first('passwordMember')}}</strong>
                            </div>
                        @endif
                    @endif
                </div>
                @if(isset($edit))
                    <input type="hidden" name="id" value="{{$edit->id}}">
                    <button type="submit" style="background-color:#FF8D65"
                            name="editMember" class="btn btn-primary">
                        Editer
                    </button>
                @else
                    <button type="submit" style="background-color:#FF8D65"
                            name="submitMember" class="btn btn-primary">
                        Ajouter
                    </button>
                @endif

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('.editPassword').on('click', function () {
                let passwordUpdate = document.getElementById('passwordUpdate');

                if (passwordUpdate.style.display == 'none') {
                    passwordUpdate.style.display = 'block';
                    document.getElementById('passwordMember').removeAttribute('disabled');
                } else {
                    passwordUpdate.style.display = 'none';
                    passwordUpdate.disabled = true;
                }
                ;

            })
        })
    </script>
@endsection
