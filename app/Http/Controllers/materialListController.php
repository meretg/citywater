<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\materialList;
use App\Quotation;
class materialListController extends Controller
{
   public function showMaterialList(Request $request){
     $array=array();
     $materialList=materialList::findOrFail($request->id);
     $quotationDetails=Quotation::findOrFail($materialList->quotationId);
     $array["materialList"]=$materialList;
     $array["quotationDetails"]=$quotationDetails;
     return $array;
   }
   public function createMaterialList(Request $request){


     $newMaterialList=new materialList;
     $newMaterialList->item=$request->item;
     $newMaterialList->quantity=$request->quantity;
     $newMaterialList->purpose=$request->purpose;
     $newMaterialList->price=$request->price;
     $newMaterialList->sellingPrice=$request->sellingPrice;
     $newMaterialList->quotationId=$request->quotationId;

     //$newRFQ->clientId=$request->clientId;
     // $a="RFQ";
     // $b=$newRFQ->id;
     // $serial=$a.$b;
     // $newRFQ->serial=$serial;
     // echo ($newRFQ->id);


     $newMaterialList->save();

     //$this->generateSerial($newMaterialList->id);

     return json_encode(true);
 }
 public function generateSerial($id){
   //$RFQ->created_at = Carbon::now();
   $a="QML000";
   $MaterialList=materialList::where('id',$id)->first();
   $b=2000-($MaterialList->created_at->year);
   $x=Carbon\Carbon::now();
 //echo ($x->year);

   // if($RFQ->created_at->hour==14){
   //   $id=1;
   //   $RFQ["serial"]=$a.$id.$b;
   //   $RFQ->save();
   // }



   $MaterialList["serial"]=$a.$id.$b;
   $MaterialList->save();


 }
 public function updateMaterialList(Request $request){

 $materialList=materialList::findOrFail($request->id);

 $materialList->item=$request->item;
 $materialList->quantity=$request->quantity;
 $materialList->purpose=$request->purpose;
 $materialList->price=$request->price;
 $materialList->sellingPrice=$request->sellingPrice;
 $materialList->quotationId=$request->quotationId;
 //$materialList->clientId=$request->clientId;

 $materialList->save();
 return json_encode(true);
 }
 public function deleteMaterialList(Request $request){

 $materialList=materialList::findOrFail($request->id);

 $materialList->delete();
 return json_encode(true);
 }


}
