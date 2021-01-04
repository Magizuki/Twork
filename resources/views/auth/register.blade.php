@extends('layouts.MasterPage')

@section('title', 'Register — Twork')

@section('content_placeholder')

@if (Auth::check())
    <script>window.location = "/home";</script>
@endif

<br>
<br>
<div class="container" style="background-color: rgba(182, 164, 141, 0.801); border-radius: 5px ">

    <div class="justify-content-center" style="text-align: center" >

        <br>
        <h1 style="font-family: 'Oswald', sans-serif; color: black">REGISTER</h1>
        <br>
        <hr>

        <form method="POST" action="{{ url('/doRegister') }}" >
            @csrf
            <div class="form-group">
              <input type="text" class="form-control  @error('Email') is-invalid @enderror" id="Email" name="Email" placeholder="Email">

              {{-- Pesan error untuk email --}}
              @error('Email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name" placeholder="Full Name">

                {{-- Pesan error untuk name --}}
                @error('Name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <input type="text" class="form-control @error('Username') is-invalid @enderror" id="Username" name="Username" placeholder="Username">

                {{-- Pesan error untuk username --}}
                @error('Username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('Password') is-invalid @enderror" id="Password" name="Password" placeholder="Password">

                {{-- Pesan error untuk password --}}
                @error('Password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
              <input type="password" class="form-control @error('ConfirmPassword') is-invalid @enderror" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password">

               {{-- Pesan error untuk confirm password --}}
               @error('ConfirmPassword')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror

            </div>
            <br>
            <input type="checkbox" name="agreement"> I agree term and agreement
            <br>
            <button type="submit" class="btn btn-warning my-3">REGISTER</button>
        </form>

    </div>

</div>

@endsection