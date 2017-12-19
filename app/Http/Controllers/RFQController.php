<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\RFQ;
use App\client;

use Carbon;
class RFQController extends Controller
{
  public function createRFQ(Request $request){


    $newRFQ=new RFQ;
    $newRFQ->type=$request->type;
    $newRFQ->status=$request->status;
    $newRFQ->RFQ_description=$request->RFQ_description;
    $newRFQ->clientId=$request->clientId;
    // $a="RFQ";
    // $b=$newRFQ->id;
    // $serial=$a.$b;
    // $newRFQ->serial=$serial;
    // echo ($newRFQ->id);
  //$index=$newRFQ->id;

    $newRFQ->save();
    // $id=$newRFQ->id;
    // $PreviousRFQ=RFQ::where('id',($id-1))->first();


     $this->generateSerial($newRFQ->id);

    return json_encode(true);
}
public function generateSerial($id){
  //$RFQ->created_at = Carbon::now();

  $code="RFQ000";
  $RFQ=RFQ::where('id',$id)->first();
  $PreviousRFQ=RFQ::where('id',($id-1))->first();
  $previousIndex=$PreviousRFQ->id;
  $Index=$id;
  $year=2000-($RFQ->created_at->year);
  $newYear=Carbon\Carbon::now();
  if($RFQ->created_at->year<>$PreviousRFQ->created_at->year){
      $Index=1;
      $previousIndex=0;
   }

  $Index=$previousIndex+1;
  $previousIndex=$Index;
  echo("sd");

  $RFQ["serial"]=$code.$Index.$year;
  $RFQ->save();

//return $index;
}
  public function showRFQ(){
    $i=0;
    $RFQ_Ids=RFQ::pluck('id');
    foreach($RFQ_Ids as $RFQ_Id){
      $client_RFQ=new \stdClass();
      $RFQ=RFQ::where('id',$RFQ_Id)->first();
      $client_RFQ->serial=$RFQ->serial;
      $client_RFQ->RFQ_description=$RFQ->RFQ_description;
      $client_RFQ->type=$RFQ->type;
      $client_RFQ->status=$RFQ->status;
      $client=client::where('id',$RFQ->clientId)->first();
      $client_RFQ->client=$client["companyName"];
      $array[$i++]=$client_RFQ;


    }
    return json_encode($array);
    }
    public function updateRFQ(Request $request){
      $RFQId=$request->id;
      $RFQ=RFQ::findOrFail($RFQId);

      $RFQ->serial=$request->serial;
      $RFQ->RFQ_description=$request->RFQ_description;
      $RFQ->type=$request->type;
      $RFQ->status=$request->status;
      $RFQ->clientId=$request->clientId;


      $RFQ->save();
      return json_encode(true);


}
public function deleteRFQ(Request $request){

$RFQ=RFQ::findOrFail($request->id);

$RFQ->delete();
return json_encode(true);
}

}
