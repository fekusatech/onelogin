@extends('layouts.app')
@section('container')
<div class="content-wrapper">
    <div class="pt-5"></div>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><span><strong>Hello, <b>{{ ucwords(auth()->user()->name) }}</b>.</strong>
                            <br>Silahkan pilih {{$active}} yang ingin anda akses</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-start">
                    <a href="{{url('/')}}" class="btn bg-light"><i class="fas fa-angle-double-left"></i></a>
                </div>
            </div>
            <div class="pt-3"></div>
            <div class="row">
                @foreach ($datamenus as $datamenu)
                <?php
                $link = $datamenu->login_url . "?" . $reqparam . "&target={$datamenu->link}";

                ?>
                <div class="col-sm-4 mb-4">
                    <!-- <a href="#" onclick="alerttoast(`Masih dalam pengembangan`)"> -->
                    <!-- <a href="{{$datamenu->login_url}}?identity=poseidonwood&password=test&bypass=true"> -->
                    <a href="{{$link}}&return={{url('/')}}">
                        <div class="position-relative p-3 card-overlay bg-gray shadow" style="height: 180px;border-radius:16px;">
                            {{ $datamenu->nama }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @if($unit_nm == "Feedmill")
            <div class="row">
                <label>Tracking </label>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection