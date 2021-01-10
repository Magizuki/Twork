@extends('layouts/MasterPage')

@section('title', 'Upgrade')

@section('css_masterpage')
    <style>
        .LineHomePage{
            height: 10px;
        }
        .upgrade-content{
            font-weight:500; 
            font-size: 30px;
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
        <div class="upgrade-content">
            <p> Benefits : </p>
            - Max Storage Capacity increased from 15 GB to 500 GB <br>
            - Max Editor in one project can be set up from 1-500 people <br>
            - Premium Sticker enabled <br>
        </div>
    </div>
    <br>
   <br>
    <br>
    <div class="justify-content-center" style="text-align: center; font-weight: 500; font-size: 30px" >
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