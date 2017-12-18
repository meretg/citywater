<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Quotation;
use App\RFQ;
use App\client;

class QuotationController extends Controller
{
      public function createQuotation(Request $request){
        $newQutation=new Quotation;
        $newQutation->serial=$request->serial;
        $newQutation->status=$request->status;
        $newQutation->clientId=$request->clientId;
        $newQutation->RFQId=$request->RFQId;

        $newQutation->save();
        return json_encode(true);
      }
      public function showQuotation(Request $request){
        $array=array();
        $Quotation=Quotation::where('id',$request->id)->first();
        $RFQ=RFQ::where('id',$Quotation->RFQId)->first();
        $client=client::where('id',$Quotation->clientId)->first();
        $array["Quotation"]=$Quotation;
        $array["RFQ"]=$RFQ;
        $array["client"]=$client->companyName;
        return json_encode($array);
      }
      public function updateQuotation(Request $request){
      $Quotation=Quotation::findOrFail($request->id);
        $Quotation->serial=$request->serial;
        $Quotation->status=$request->status;
         $Quotation->clientId=$request->clientId;
         $Quotation->RFQId=$request->RFQId;

        $Quotation->save();
        return json_encode(true);

      }
      public function deleteQuotation(Request $request){
        $Quotation=Quotation::findOrFail($request->id);

        $Quotation->delete();
        return json_encode(true);

      }
      


}
