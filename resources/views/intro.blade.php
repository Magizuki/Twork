@extends('layouts.master')

@section('title', 'Intro — Twork')

@section('content')

@if (Auth::check())
    <script>window.location = "/home";</script>
@endif

<div class="container">

    <div class="justify-content-center" style="text-align: center" >

        <img src="{{ asset('/Assets/LogoTwork.png') }}" alt="gambar logo" style="width: 50%; height: 10%;">
    
        <h1 style="color: rgb(247, 223, 8); font-family: 'Oswald', sans-serif;">Better Performance in Teamwork</h1>

        <button type="submit" class="btn btn-warning my-3">
            {{ __('Download Here Via Windows 10') }}
        </button>
    
    </div>

</div>

@endsection