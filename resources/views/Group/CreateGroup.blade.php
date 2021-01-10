@extends('layouts/MasterPage')

@section('title','Create Group')

@section('css_masterpage')
    <style>
        .cbxCreateGroup{
            width:20px;
            height:20px;
            float: left;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content_placeholder')
    <div class="container mt-5 pt-3 pb-3 border border-primary rounded-pill" style="background-color: white;">
            <h1 class="text-center">Create Group</h1>
            <div style="margin-left:200px;">
            <form action="/submitgroup" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row form-group mt-4">
                    <div class="col-3">
                        Group Name :
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control " name="GroupName" id="GroupName">
                    </div>
                </div>
                <div class="row form-group mt-4">
                    <div class="col-3">
                        Feature :
                    </div>
                    <div class="col-4">
                        {{-- Akan di generate dari db --}}
                        @foreach ($Feature as $data)
                        <input type="checkbox" class="form-control cbxCreateGroup" name="GroupFeature[]" value={{$data->id}}>
                        <span>{{$data->FeatureName}}</span>
                        <br>
                        @endforeach
                        
                    </div>
                </div>
                
                {{-- <div class="row form-group mt-4">
                    <input type="checkbox" name="cbxagreement"> I agree term and agreement
                </div> --}}

                <div class="row form-group mt-4">
                    <div class="col-9 text-center">
                        <input type="submit" class="btn btn-success" name="btnCreateGroup" id="btnCreateGroup" value="Submit">
                    </div>
                </div>
               
            </form>
        </div>
        @if(session('success'))
            <div class="alert alert-success mx-auto" role="alert" style="width:500px;">
                <button type="button" class="close" data-dismiss="alert">close</button>
                {{session('success')}}
            </div>
        @elseif(session('failed'))
        <div class="alert alert-failed mx-auto" role="alert" style="width:500px;">
            <button type="button" class="close" data-dismiss="alert">close</button>
            {{session('failed')}}
        </div>
        @endif
    </div>
@endsection