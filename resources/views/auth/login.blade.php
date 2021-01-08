@extends('layouts.MasterPage')

@section('title', 'Login — Twork')

@section('content_placeholder')

@if (Auth::check())
    <script>window.location = "/home";</script>
@endif

<br>
<br>
<div class="container" style="background-color:  rgba(182, 164, 141, 0.801); border-radius: 5px">

    <div class="justify-content-center" style="text-align: center" >
        <br>
        <h1 style="font-family: 'Oswald', sans-serif; color: black">LOGIN</h1>
        <br>
        <hr>

        <form method="POST" action={{ url('/doLogin') }} >
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <br>
            <input type="checkbox" name="remember"> Remember Me
            <br>
            <br>
            <button type="submit" class="btn btn-warning my-3">LOGIN</button>
        </form>
        <br>
        <br>
    
    </div>

</div>

<script>
  var message = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist!=false){
    alert(message);
  }
</script>

@endsection