@extends('layouts.master')
@section('content')







<form action="" method="post">


        @csrf

    <div class="container-fluid">
        <div class="container">
            <div class="card-group">
                <div class="card">
                    @if($articles['img'] != null)

                        
                        <img src="{{ asset('storage/images/'.$articles['img']) }}" class="card-img-top est-img mx-auto" alt="...">
                    @else
                        <img src="{{ asset('storage/images/logo.png') }}" class="card-img-top est-img mx-auto" alt="...">
                   @endif
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $articles['name'] }}</strong></h5>
                        <p class="card-text">{{ $articles['gender'] }}</p>
                        <p class="card-text"><strong>Category : </strong>{{ $articles['category'] }}</p>
                        <p class="card-text"><strong>Emplacement :</strong>  {{ $articles['rank'] }}</p>

{{--                     {{ dd($articles['declinations']) }}--}}
                 @foreach( $articles['declinations'] as $color => $declination)
                            <p class="card-text mt-3"><strong>color :</strong> {{ $color }}</p>

                        <ul class="list-group list-group- text-center">
                        @foreach( $articles['declinations'][$color] as $size => $quantity)
                                <li class="list-group-item d-flex justify-content-around">
                                    @if( $quantity < 1)
                                            <span class="text-left">Taille : {{$size}} --   Plus de Stock </span>
                                    @else
                                        <span class="text-left">Taille : {{$size}}  --  Quantité {{$quantity}} </span>
                                        @endif
                        <div>
{{--                            @if()--}}
                            <input type="number" id="tentacles" class="est-input text-center" name="vendu[{{ $articles['id'][$color][$size]}}]"  min="0" max="{{ $quantity }}">
                            <input type="hidden" name="id_product" value="{{ $articles['id_product'] }}">
{{--                            @endif--}}
                        </div>
                                </li>
                        @endforeach
                        </ul>

                @endforeach
                </div>
                    <button type="submit" class="btn btn-primary est-btn" >Articles Vendu</button>
            </div>
        </div>
    </div>
</form>

@endsection
