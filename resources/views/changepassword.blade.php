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
                <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirm New Password">
            </div>

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