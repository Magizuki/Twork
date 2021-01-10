@extends('layouts/MasterPage')

@section('title', 'My Profile')

@section('css_masterpage')
    <style>
        .LineHomePage{
            height: 10px;
        }
    </style>

@endsection

@section('content_placeholder')

<br>
<br>
<br>
<br>
<div class="container">

    <div class="justify-content-center" style="text-align: center" >

        <h1 style="font-family: 'Oswald', sans-serif;">My Profile</h1>
        <br>
        <br>
        <br>
        <h1>Email : {{Auth::user()->email}} </h1>
        <br>
        <h1>Full Name : {{Auth::user()->name}} </h1>
        <br>
        <h1>Nickname : {{Auth::user()->username}} </h1>
        <br>
        <br>
        <button type="button" onclick="window.location='{{ url("/changepassword/".Auth::user()->id) }}'" class="btn btn-warning my-3"> 
            {{ __('Change Password') }}
        </button>
        <br>
        <button type="button" onclick= "window.location='{{ url("/upgrade") }}'" class="btn btn-warning my-3"> 
            {{ __('Upgrade') }}
        </button>

    </div>

</div>

@endsection