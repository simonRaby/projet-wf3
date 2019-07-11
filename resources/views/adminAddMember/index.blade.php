{{--Formulaire d"ajout de membre--}}
@extends("layout.master")
@section("content")

    @if (Session::get('successMessage'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('succesMessage')}}Membre ajouté avec succès.</strong>
        </div>
    @endif

    <div class="container text-center">
        <div class="col-5 offset-3">
            <h2>Ajouter un membre</h2>
            <form method="POST" name="addMember">{{csrf_field()}}

                <div class="form-group">
                    <label for="lastName">Nom</label><br>
                    <input class="form-control" value="{{old('lastName')}}" type="text" name="lastName"
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
                           name="firstName" value="{{old('firstName')}}" required>
                    @if($errors->has('firstName'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('firstName')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input class="form-control" type="email" name="email"
                           value="{{old('email')}}" required>
                    @if($errors->has('email'))
                        <div role="alert" class="alert alert-danger">
                            <strong>{{$errors->first('email')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="passwordMember">Mot de passe attribué</label><br>
                    <input class="form-control" type="password"
                           name="passwordMember" placeholder="6 caractères requis" required>
                    <small><strong>Veuillez inclure un caractère spécial, une majuscule ainsi qu'une minuscule.</strong></small>
                    @if($errors->has('passwordMember'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('passwordMember')}}</strong>
                        </div>
                    @endif
                </div>

                <button type="submit" style="background-color:#FF8D65" name="submitMember" class="btn btn-primary">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
@endsection
