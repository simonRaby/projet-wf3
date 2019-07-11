@extends('layouts.master')

@section('content')
<div class="container">
    @isset($articles)
        @foreach ($articles as $article)
        <div class="row">
        <div class="col-2">{{ $article['name']}}</div>
            <div class="col-2">{{ $article['categorie']}}</div>
            <div class="col-2">{{ $article['gender']}}</div>
            <div class="col-2">{{ $article['color']}}</div>
            <div class="col-2">{{ $article['size']}}</div>
            <div class="col-2">{{ $article['quantity']}}</div>
        </div>
        @endforeach
    @endisset
</div>
@endsection
