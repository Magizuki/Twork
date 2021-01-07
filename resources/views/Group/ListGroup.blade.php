@extends('layouts/masterpage')

@section('title','View Group')

@section('content_placeholder')
    <div class="container">
        <h1 class="text-center text-white mt-3">My Group</h1>
        <div class="container mt-5 pt-3 pb-3 ">
            @if($listGroup->count() < 1)
            <h1 class="text-center text-white mt-3">You don't have group!</h1>
            @else
            <div class="row mx-auto">
                @foreach($listGroup as $data)
                <div class="col-lg-4 d-flex flex-column border rounded bg-white">
                    <h2 class="text-center">{{$data->group->groupName}}</h2>
                    <img class="mx-auto" src="{{ asset('/Assets/LogoTwork.png') }}" height="300px" width="300px">
                    <a class="btn btn-primary mb-3" href="../viewgroup/{{$data->group->id}}">Open Group</a>
                </div> 
                @endforeach
            </div>
            @endif
                
        </div>
    </div>
@endsection