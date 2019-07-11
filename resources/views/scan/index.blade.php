@extends('layouts.welcome')
@section('css')
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript"  src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
@endsection
@section('content')
    <video id="preview"></video>
    <script type="text/javascript" src="{{ asset('js/camera.js') }}"></script>
@endsection
