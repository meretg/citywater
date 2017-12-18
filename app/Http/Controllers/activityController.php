<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\activity;
use App\clientContactPerson;
use App\client;
use std;


class activityController extends Controller
{
    public function createActivity(Request $request){

    //
      $newActivity=new activity;
      $newActivity->type=$request->type;
      $newActivity->status=$request->status;
      $newActivity->Date=$request->Date;
      $newActivity->textInput=$request->textInput;
      $newActivity->comments=$request->comments;

      $newActivity->save();
      return json_encode(true);
  }
  public function showActivity(Request $request){
    $activityId=$request->id;
    $activity= activity::findOrFail($activityId);
    return json_encode($activity);
  }
  public function showclientActivity(Request $request){
    $i=0;
    $array=array();
    $client_activity=array();
    $clientIds=client::pluck('id');
    //echo ($clientIds);
    foreach($clientIds as $clientId){
      //echo ($clientId);
      $client_activity=new \stdClass();
      $activity=activity::where('id',$clientId)->first();
      $person=clientContactPerson::where('id',$clientId)->first();
      $client=client::where('id',$clientId)->first();
        $client_activity->activityStatus=$activity["status"];
        $client_activity->activityType=$activity["type"];
        $client_activity->activityDate=$activity["date"];
        $client_activity->person=$person["name"];
        $client_activity->client=$client["companyName"];
        $array[$i++]=$client_activity;
    }
      return json_encode($array);
    }



}
