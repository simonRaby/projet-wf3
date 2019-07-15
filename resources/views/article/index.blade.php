@extends('layouts.master')
@section('content')








    <div class="container-fluid">
        <div class="container">
            <div class="card-group">
                <div class="card">
                    <img src="{{ asset('storage/images/logo.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $articles['name'] }}</strong></h5>

                        <p class="card-text">{{ $articles['gender'] }}</p>
                        <p class="card-text">Category : {{ $articles['category'] }}</p>

{{--                     {{ dd($articles['declinations']) }}--}}
                 @foreach( $articles['declinations'] as $color => $declination)
                            <p class="card-text mt-3"><strong>color :</strong> {{ $color }}</p>

                        <ul class="list-group list-group- text-center">
                        @foreach( $articles['declinations'][$color] as $size => $quantity)
                                <li class="list-group-item">{{$size}}  : {{$quantity}}</li>
                        @endforeach
                        </ul>

                @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
