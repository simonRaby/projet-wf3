@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    @endsection
@section('content')

    <div class="container-fluid">
        <div class="container ">
            <h1 class="est-h1 mb-5">Ajout d'un Article</h1>
            <form action="" method="POST" id="formulaire">
                <div class="card">
                    <div class="card-header">
                        <h2>Article</h2>
                    </div>

                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="name">Nom de L'article</label>
                                    <input type="text" class="form-control" id="name" placeholder="TeeShirt Nike" name="name">
                                </div>
                                <div class="col-6">
                                    <label for="category">Categorie</label>
                                    <select class="custom-select my-1 mr-sm-2" id="category" name="category_id">
                                        <option selected>---</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-6">
                                    <label for="marque">Marque</label>
                                    <select class="custom-select my-1 mr-sm-2" id="marque"  name="marque_id">
                                        <option selected>---</option>
                                        @foreach($marques as $marque)
                                            <option value="{{ $marque['id'] }}">{{ $marque['label'] }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control" id="marque" placeholder="Si votre marque n'est pas dedans" name="marqueNull">

                                </div>
                                <div class="col-6">
                                    <label for="gender">Genre</label>
                                    <select class="custom-select my-1 mr-sm-2" id="gender"  name="gender_id">
                                        <option selected>---</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender['id'] }}">{{ $gender['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h2>Déclinaison(s)</h2>
                                </div>
                                <div class="col-6 text-right">
                                        <i class="fas fa-plus-circle est-logo"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                        <div class="card first">
                            <div class="card-body">
                                <div class="form-row mt-3">
                                    <div class="col-6">
                                        <label for="color">Couleur</label>
                                        <select class="custom-select my-1 mr-sm-2 est-color" id="color[]"  name="color_id[]">
                                            <option selected>---</option>
                                            @foreach($colors as $color)
                                                <option value="{{ $color['id'] }}">{{ $color['label'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-6">
                                        <label for="size">Taille</label>
                                        <select class="custom-select my-1 mr-sm-2 size" id="size[]"  name="size_id[]">
                                            <option selected>---</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="quantity">Quantité</label>
                                        <input type="text" class="form-control" id="quantity[]" placeholder="10" name="quantity[]">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-1 offset-11 text-right mb-3">
                                        <i data-id="1" class="fas fa-minus-circle est-logo"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                </div>
                <div class="row text-center mt-5 mb-5">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary" name="btn" value="0">Enregistrer</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary" name="btn" value="1">Enregistrer & Ajouter un nouveaux produit</button>
                    </div>
                </div>
         </form>

        </div>
    </div>


@endsection
@section('ajax')
    <script>
        $(function () {

            let cat = $('#category');

            function categoryFunc(){
                // let value = $(this).val();

                let test = cat.val();
                console.log(test);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                    }
                });

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'categoryAjax?category='+ test,
                })
                    .always(function(data){
                        console.log(typeof data);
                        $('.size_option').remove() ;



                        var last = $('.size'); // .last();
                        $.each(data, function(index,size) {
                            last.append('<option class="size_option" value="'+size.id+'">'+ size.label+' </option>');
                        });
                    })
            }

            cat.on('change',   function(){
                categoryFunc();
            });

            $(document).on('click','.fa-plus-circle' ,function(){
                var first = $('.first'); // selection de la div a clone
                var card = first.clone(); // clone la div select
                card.removeClass('first'); // on remove la class qui a permit la selection

                first.after(card);          // puis on insere la copy  de la div
                categoryFunc();


            });

            $(document).on('click','.fa-minus-circle', function(){
              var select = $(this).closest('.card');
              console.log(select);
                if(select.hasClass('first')){
                    $('#formulaire')[0].reset()
                }else{
                    select.remove();
                }

              //   console.log('coucou');
                   // $( this ).closest( ".card" ).remove();
                   //
                   // $('#formulaire')[0].reset();


            });

            // $('body').on('change', function(){
            //
            // })
        })

    </script>
@endsection
