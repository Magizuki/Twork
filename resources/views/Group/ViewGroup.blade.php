@extends('layouts/masterpage')

@section('title','Group')

@section('content_placeholder')

    <div class="container"  style="height: 700px">
        <div class="row mx-auto mt-4 bg-white" style="height: 700px">
                <div class="col-4 d-flex flex-column border">
                    <a class="btn btn-primary mt-2" style="width: 150px" href="../listgroup">View All Group</a>
                    <img class="mx-auto" src="{{ asset('/Assets/LogoTwork.png') }}" height="200px" width="200px">
                    <h2>{{$groupval->groupName}}</h2>
                    <button  class="btn btn-secondary mt-5 mb-3 mx-auto" style="width:300px" data-toggle="modal" data-target="#ViewMemberModal" style="margin-bottom: 40px;width: 160px">View Member</button>
                    @if(session('success'))
                        <div class="alert alert-success mx-auto border" role="alert" style="width:300px;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{session('success')}}
                        </div>
                   @elseif(session('failed'))
                        <div class="alert alert-failed mx-auto border" role="alert" style="width:300px;color: red">
                            <button type="button" class="close" data-dismiss="alert">close</button>
                            {{session('failed')}}
                        </div>
                    @endif
                </div>
                <div class="col-8 d-flex flex-column border">
                    <div class="title">
                        {{$groupval->groupName}}
                    </div>
                    <div class="overflow-auto border" style="height: 600px;">
                        @foreach ($groupval->grouphistory->historytext as $item)
                            @if($item->userId == Auth::user()->id)
                            <div class="d-flex justify-content-end mt-3">
                                <div class="p-2 bd-highlight border border-primary rounded mr-3">
                                    <p style="margin:0">{{$item->user->name}}</p>
                                    <p style="margin:0">{{$item->textChat}}</p>
                                </div>
                            </div>
                            @else
                            <div class="d-flex justify-content-start mt-3">
                                <div class="p-2 bd-highlight border  border-primary rounded ml-3">
                                    <p style="margin:0">{{$item->user->name}}</p>
                                    <p style="margin:0">{{$item->textChat}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <form action="../sendchat/{{$groupval->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" style="width:600px" name="chatbox" id="chatbox">
                            <input class="btn btn-primary" style="margin-bottom:5px" type="submit" value="Send">
                        </form> 
                    </div>
                </div>
        </div>
        {{-- Modal Start Here --}}
        <div class="modal" id="ViewMemberModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">List Member</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body overflow-auto" style="max-height: 300px">
                   
                    <table class="table">
                        <thead>
                            <th>Member Name</th>
                        </thead>
                        <tbody>
                            @foreach ($groupval->groupMember as $member)
                            <tr>
                                <th>{{$member->Member->name}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                <form action="/addmember/{{$groupval->id}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <input type="text" id="txtEmailInvite" name="txtEmailInvite" placeholder="email">
                <input type="submit" class="btn btn-secondary" value="Invite Member">
                </form>
                </div>
              </div>
            </div>
          </div>
          {{-- Modal End Here --}}
    </div>

@endsection