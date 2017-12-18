<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientContactPerson;
use App\Http\Requests;

class clientContactPersonController extends Controller
{
    public function addClientContactPerson(Request $request){


               $newClientContactPerson=new clientContactPerson;
               $newClientContactPerson->name=$request->name;
               $newClientContactPerson->title=$request->title;
               $newClientContactPerson->mobile=$request->mobile;
               $newClientContactPerson->email=$request->email;
               $newClientContactPerson->save();
               return json_encode(true);





            }
    public function getClientContactPerson(Request $request){
            $clientContactPersonId=$request->id;
            $clientContactPerson=clientContactPerson::findOrFail($clientContactPersonId);
            return json_encode($clientContactPerson);
            }
    public function updateClientContactPerson(Request $request){
              $clientContactPersonId=$request->id;
              $clientContactPerson=clientContactPerson::findOrFail($clientContactPersonId);

              $clientContactPerson=new clientContactPerson;
              $clientContactPerson->name=$request->name;
              $clientContactPerson->title=$request->title;
              $clientContactPerson->mobile=$request->mobile;
              $clientContactPerson->email=$request->email;
              $clientContactPerson->save();
            return json_encode(true);
            }
      public function deleteContactPerson(Request $request){
            $clientContactPersonId=$request->id;
            $clientContactPerson=clientContactPerson::findOrFail($clientContactPersonId);
            $clientContactPerson->delete();
            return json_encode($clientContactPerson);
            }


}
