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
    <div class="container mt-5">
        <div class="d-flex justify-content-center ">
            <div class="p-5 bd-highlight mr-5">
                <a href="#" role="button" class="btn btn-success btn-lg active">
                    Create New Project 
                </a>
            </div>
            <div class="p-5 bd-highlight">
                <a href="#" role="button" class="btn btn-primary btn-lg active">
                    Open Existring Project
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="p-2 bd-highlight mr-5">
                <h3 class="text-white">Recent Project</h3>
            </div>
            <div class="p-2 bd-highlight mt-2">
                {{-- akan di ganti sesuai storage user --}}
                <h5>13 GB of 15 GB used</h5>
            </div>
        </div>
       
        <hr class="LineHomePage">

        <div class="content">
            {{-- akan diisi sesuai dengan list project --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Last Modified</th>
                        <th scope="col">Owner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $data)
                    <tr>
                        <th scope="row"  class="text-white">1</th>
                        <td >
                            {{-- akan di href ke project detail --}}
                            <a href="#" class="text-white" >
                                {{$data->ProjectName}}
                            </a>
                        </td>
                        <td class="text-white">{{$data->AuditActivity}}</td>
                        <td  class="text-white">{{$data->AuthorEmail}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
@endsection