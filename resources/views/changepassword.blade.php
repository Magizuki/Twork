@extends('layouts/masterpage')

@section('title', 'Change Password')

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

    <div class="justify-content-center" style="text-align: center">
        <br>
        <br>
        <h1 style="font-family: 'Oswald', sans-serif;">Change Password</h1>
        <br>
        <br>
        <br>
        <form method="POST" action={{url("/dochangepassword")}} >
            @csrf
            <div class="form-group">
                <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" id="oldpassword" name="oldpassword" placeholder="Old Password">
            </div>

            {{-- Pesan error untuk password --}}
            @error('oldpassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-group">
                <input type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword" name="newpassword" placeholder="New Password">
            </div>

            {{-- Pesan error untuk password --}}
            @error('newpassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-group">
                <input type="password" class="form-control @error('confirmnewpassword') is-invalid @enderror" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirm New Password">
            </div>

            {{-- Pesan error untuk password --}}
            @error('confirmnewpassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <br>
            <button type="submit" class="btn btn-warning my-3">Change Password</button>

        </form>

    </div> 

</div>

<script>
    var messag = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist != false){
      alert(message);
    }
</script>

@endsection