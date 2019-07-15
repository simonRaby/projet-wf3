@extends('layouts.scan-master')
@section('css')
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript"  src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
@endsection
@section('content')

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="est-h1">Scan QrCode</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <video id="preview" class="est-video"></video>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/camera.js') }}"></script>
@endsection
