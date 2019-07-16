{{--formulaire d'ajout de partenaire--}}
@extends('layout.master')
@section('content')
    @if (Session::get('successMessage'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('succesMessage')}}Partenaire ajouté avec succès.</strong>
        </div>
    @endif
    <div class="container text-center">
        <div class="col-5 offset-3">
            <h2>Ajouter un partenaire</h2>
            <form action="adminAddPartner" method="post" name="addPartner">{{csrf_field()}}
                <div class="form-group">
                    <label for="partnerName">Raison Sociale</label><br>
                    <input class="form-control" value="{{old('partnerName')}}" type="text" name="partnerName" required>
                    @if($errors->has('partnerName'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerName')}}</strong>
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="partnerDirector"> Prénom Directrice(teur)</label><br>
                    <input value="{{old('partnerDirector')}}" class="form-control" type="text" name="partnerDirector"
                           required>
                    @if($errors->has('partnerDirector'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerDirector')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerDirectorLstNme">Nom Directrice(teur)</label><br>
                    <input value="{{old('partnerDirectorLstNme')}}" class="form-control" type="text" name="partnerDirectorLstNme"
                           required>
                    @if($errors->has('partnerDirectorLstNme'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerDirectorLstNme')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerAddress">Adresse</label><br>
                    <input value="{{old('partnerAddress')}}" class="form-control" type="text" name="partnerAddress"
                           required>
                    @if($errors->has('partnerAddress'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerAddress')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerPostalCode">Code Postal</label><br>
                    <input value="{{old('partnerPostalCode')}}" class="form-control partnerPostalCode"
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
                    @if($errors->has('selectCity'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('selectCity')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerPhone">Téléphone</label><br>
                    <input value="{{old('partnerPhone')}}" class="form-control" type="text" name="partnerPhone"
                           required>
                    @if($errors->has('partnerPhone'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerPhone')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerMail">Email</label><br>
                    <input value="{{old('partnerMail')}}" class="form-control" type="email" name="partnerMail" required>
                    @if($errors->has('partnerMail'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerMail')}}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="partnerSiret">SIRET</label><br>
                    <input value="{{old('partnerSiret')}}" class="form-control" type="text" name="partnerSiret"
                           required>
                    @if($errors->has('partnerSiret'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('partnerSiret')}}</strong>
                        </div>
                    @endif
                </div>

                <button type="submit" style="background-color:#FF8D65" name='submitPartner' class="btn btn-primary">
                    Ajouter
                </button>

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

