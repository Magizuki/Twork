<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\feature;
use App\Trfeature;
use App\project;
use App\group;
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
            $group = group::where('UserId','=',Auth::user()->id)->first();
            foreach($request->GroupFeature as $data){
                Trfeature::insert(array(
                    'featureId' => $data,
                    'groupId' => $group->id,
                    'AuditUsername' => Auth::user()->name,
                    'AuditTime' => Carbon::now()->toDateTimeString(),
                    'AuditActivity' => "I",
                ));
            }

            $project = project::where('UserId','=',Auth::user()->id)->get();
            return Redirect::back()->with('success','Success Create Group');
        }
        catch(Exception $e ) {
            return Redirect::back()->with('failed','Failed Create Group');
        }
    }

    public function ViewGroup(){
        $Group = group::where('UserId','=',Auth::user()->id)->get();
        return View('Group/ListGroup',['Group'=>$Group]);
    }
}
