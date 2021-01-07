@extends('layouts/masterpage')

@section('title', 'Home')

@section('css_masterpage')
    <style>
        .LineHomePage{
            height: 10px;
        }
    </style>

@endsection

@section('content_placeholder')

<br>
<div class="container">

    <div class="justify-content-center" style="text-align: center" >
        <h1 style="color: black; font-family: 'Oswald', sans-serif;">UPGRADE</h1>
        <hr>
        <br>
        Benefits : <br>
        - Max Storage Capacity increased from 15 GB to 500 GB <br>
        - Max Editor in one project can be set up from 1-500 people <br>
        - Premium Sticker enabled <br>
    </div>

   
    <br>
    <div class="justify-content-center" style="text-align: center" >
       Price : IDR 750.000,00
    </div>


    <div class="justify-content-center" style="text-align: center; " >

        <button type="button" class="btn btn-warning my-3"> 
            {{ __('Pay with GoPay') }}
        </button>

        <button type="button" class="btn btn-warning my-3"> 
            {{ __('Pay with Ovo') }}
        </button>

        <button type="button" class="btn btn-warning my-3"> 
            {{ __('Pay with BCA Bank') }}
        </button>
    
    </div>



</div>

@endsection