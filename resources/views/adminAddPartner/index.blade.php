{{--formulaire d'ajout de partenaire--}}
@extends('layouts.master')
@section('content')

    <div class="container text-center">
        <div class="col-5 offset-3">
            @if (isset($successMessage))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{$successMessage}}</strong>
                </div>
            @endif
            @if(isset($edit))
                <h2>Modifier les informations d'un partenaire</h2>
            @else
                <h2>Ajouter un partenaire</h2>
            @endif
            <form action="{{isset($edit)?'updateAdminPartner':'adminAddPartner'}}" method="post" name="{{isset($edit)?'updatePartner':'AddPartner'}}">{{csrf_field()}}
                <div class="form-group">
                    <label for="partnerName">Raison Sociale</label><br>
                    <input class="form-control"
                           value="{{isset($edit)? $edit->partner->name:old('partnerName')}}"
                           type="text" name="partnerName" required>
                    @if($errors->has('partnerName'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerName')}}</strong>
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="partnerDirectorFstNme"> Prénom du Responsable</label><br>
                    <input value="{{isset($edit)? $edit->firstname:old('partnerDirectorFstNme')}}"
                           class="form-control"
                           type="text" name="partnerDirectorFstNme"
                           required>
                    @if($errors->has('partnerDirectorFstNme'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerDirectorFstNme')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerDirectorLstNme">Nom du Responsable</label><br>
                    <input value="{{isset($edit)? $edit->lastname:old('partnerDirectorLstNme')}}"
                           class="form-control"
                           type="text"
                           name="partnerDirectorLstNme"
                           required>
                    @if($errors->has('partnerDirectorLstNme'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerDirectorLstNme')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerAddress">Adresse</label><br>
                    <input value="{{isset($edit)? $edit->partner->address:old('partnerAddress')}}"
                           class="form-control"
                           type="text" name="partnerAddress"
                           required>
                    @if($errors->has('partnerAddress'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerAddress')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerPostalCode">Code Postal</label><br>
                    <input
                        value="{{isset($edit)? $edit->partner->villeFrance->ville_code_postal:old('partnerPostalCode')}}"
                        class="form-control partnerPostalCode"
                        id="partnerPostalCode" type="text"
                        name="partnerPostalCode" required>
                    @if($errors->has('partnerPostalCode'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerPostalCode')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Ville</label>
                    </div>
                    <select name="selectCity" class="custom-select" id="selectCity" required>
                        <option selected>Veuillez sélectionner une ville</option>
                    </select>
                </div>
                @if($errors->has('selectCity'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{$errors->first('selectCity')}}</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label for="partnerPhone">Téléphone</label><br>
                    <input value="{{isset($edit)? $edit->partner->tel:old('partnerPhone')}}"
                           class="form-control"
                           type="text" name="partnerPhone"
                           required>
                    @if($errors->has('partnerPhone'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerPhone')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerMail">Email</label><br>
                    <input value="{{isset($edit)? $edit-> email:old('email')}}" class="form-control"
                           type="email"
                           name="partnerMail" required>
                    @if($errors->has('partnerMail'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerMail')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerSiret">SIRET</label><br>
                    <input value="{{isset($edit)?$edit->partner->siret:old('partnerAddress')}}"
                           class="form-control"
                           type="text" name="partnerSiret"
                           required>
                    @if($errors->has('partnerSiret'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerSiret')}}</strong>
                        </div>
                    @endif
                </div>

                @if(isset($edit))
                    <input type="hidden" name="id" value="{{$edit->id}}">
                    <button type="submit" style="background-color:#FF8D65"
                            name="editPartner" class="btn btn-primary">
                        Editer
                    </button>
                @else
                    <button type="submit" style="background-color:#FF8D65" name='submitPartner'
                            class="btn btn-primary">
                        Ajouter
                    </button>
                @endif
            </form>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $(function () {
            $("#partnerPostalCode").on("input", function () {

                let partnerPostalCode = document.getElementById("partnerPostalCode");
                if (partnerPostalCode.value.length == 5) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: 'AjaxAdminAddPartner',
                        data: 'partnerpc=' + partnerPostalCode.value,
                    })
                        .always(function (data) {

                            let cities = data.ville;

                            for (let i = 0; i < cities.length; i++) {
                                let select = document.getElementById('selectCity');
                                let option = document.createElement('option');
                                option.classList.add('city');
                                option.setAttribute('value', cities[i].ville_code_commune);
                                option.text = cities[i].ville_nom_reel;
                                select.add(option);
                            }
                        });
                } else {
                    $('.city').remove();
                }
            })

        });
    </script>
@endsection

