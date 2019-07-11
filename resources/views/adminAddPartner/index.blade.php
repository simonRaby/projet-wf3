{{--formulaire d'ajout de partenaire--}}
@extends('layout.master')
@section('content')
    <div class="container text-center">
        <div class="col-5 offset-3">
            <h2>Ajouter un partenaire</h2>
            <form method="post" name="addPartner">
                <div class="form-group">
                    <label for="partnerName">Raison Social</label><br>
                    <input class="form-control" type="text" name="partnerName" required>
                </div>

                <div class="form-group">
                    <label for="partnerDirector">Directeur</label><br>
                    <input class="form-control" type="text" name="partnerDirector" required>
                </div>

                <div class="form-group">
                    <label for="partnerAddress">Adresse</label><br>
                    <input class="form-control" type="text" name="partnerAddress" required>
                </div>

                <div class="form-group">
                    <label for="partnerPostalCode">Code Postal</label><br>
                    <input class="form-control partnerPostalCode" id="partnerPostalCode" type="text"
                           name="partnerPostalCode" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Ville</label>
                    </div>
                    <select class="custom-select" id="selectCity">
                        <option selected>Choix</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="partnerSiret">Siret</label><br>
                    <input class="form-control" type="text" name="partnerSiret" required>
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
                        data: 'partnerpc='+partnerPostalCode.value,
                        complete: function (data) {
                            let cities = data.responseJSON.ville;

                            for(let i=0; i < cities.length ;i++)
                            {
                                let select = document.getElementById('selectCity');
                                let option = document.createElement('option');
                                option.classList.add('city');
                                option.text = cities[i].ville_nom_reel;
                                select.add(option);
                            }

                        }
                    })
                }else{
                    $('.city').remove();
                }
            })

        });
    </script>
@endsection

