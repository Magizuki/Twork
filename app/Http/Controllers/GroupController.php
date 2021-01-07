<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\feature;
use App\Trfeature;
use App\project;
use App\group;
use App\grouphistory;
use App\historytext;
use App\User;
use App\usergroup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Redirect;

class GroupController extends Controller
{
    public function GetGroupFeature(){
        $Feature = feature::where('AuditActivity','!=','D')->get();
        return View('Group/CreateGroup',['Feature'=>$Feature]);
    }

    public function SubmitGroup(Request $request){
        try{
            group::insert(array(
                'userId' => Auth::user()->id,
                'groupName' => $request->GroupName,
                'historyId' => 1,
                'AuditUsername' => Auth::user()->name,
                'AuditTime' => Carbon::now()->toDateTimeString(),
                'AuditActivity' => "I",
            ));
            $group = group::where('UserId','=',Auth::user()->id)->latest('id')->first();
            foreach($request->GroupFeature as $data){
                Trfeature::insert(array(
                    'featureId' => $data,
                    'groupId' => $group->id,
                    'AuditUsername' => Auth::user()->name,
                    'AuditTime' => Carbon::now()->toDateTimeString(),
                    'AuditActivity' => "I",
                ));
            }

            grouphistory::insert(array(
                'groupId' => $group->id
            ));

            usergroup::insert(array(
                'userId' => Auth::user()->id,
                'groupId' => $group->id,
                'role' => 0
            ));


            $project = project::where('UserId','=',Auth::user()->id)->get();
            return Redirect::back()->with('success','Success Create Group');
        }
        catch(Exception $e ) {
            return Redirect::back()->with('failed','Failed Create Group');
        }
    }

    public function ListGroup(){
        $listGroup = usergroup::where('userId','=',Auth::user()->id)->get();
        return View('Group/ListGroup',['listGroup'=>$listGroup]);
    }
    
    public function SendChat($group, Request $request){
        $historyId = grouphistory::where('groupId','=',$group)->first();
        historytext::insert(array(
            'textChat' => $request->chatbox,
            'historyDate' => Carbon::now()->toDateTimeString(),
            'historyId' =>  $historyId->id,
            'userId' => Auth::user()->id
        ));
        $historyText = grouphistory::where('groupId','=',$group)->get();
        
        return Redirect('/viewgroup/'.$group);
    }


    public function ViewGroup($GroupId){
        $groupval = group::where('id','=',$GroupId)->first();
        return View('Group/ViewGroup',['groupval'=>$groupval]);
    }

    public function AddMember($groupId,Request $request){        
        try{
        $userId = User::where('email','=',$request->txtEmailInvite)->first();
        if($userId == null){
            return Redirect::back()->with('failed','Failed Invite Member'); 
        }
        else{
            $check = usergroup::where('userId','=',$userId->id)->where('groupId','=',$groupId)->first();
            if($check != null){
                return Redirect::back()->with('failed','member already exists'); 
            }
            else{
                usergroup::insert(array(
                    'userId' => $userId->id,
                    'groupId' => $groupId,
                    'role' => 1
                ));
                return Redirect::back()->with('success','Success Invite Member');
                }
           }
        }
        catch(Exception $e){
            return Redirect::back()->with('failed','Failed Invite Member');
        } 
    }
}
