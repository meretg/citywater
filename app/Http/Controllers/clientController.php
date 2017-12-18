<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\Http\Requests;

class clientController extends Controller
{
    public function addClient(Request $request){
        $this->validate($request,[
               'companyName'=>'required|unique:clients,companyName||Regex:/^([A-Za-z])/'
    
    
               ]);
    
           $newclient=new client;
           $newclient->code=$request->code;
           $newclient->companyName=$request->companyName;
           $newclient->address=$request->address;
           $newclient->email=$request->email;
           $newclient->phoneNumber=$request->phoneNumber;
           $newclient->fax=$request->fax;
           $newclient->website=$request->website;
           
           $newclient->save();
           return json_encode(true);
    
    
    
    
    
        }
        public function getClient(Request $request){
        $clientId=$request->id;
        $client=client::findOrFail($clientId);
        return json_encode($client);
        }
        public function updateClient(Request $request){
        $clientId=$request->id;
        $client=client::findOrFail($clientId);
    
        $client->code=$request->code;
        $client->companyName=$request->companyName;
        $client->address=$request->address;
        $client->email=$request->email;
        $client->phoneNumber=$request->phoneNumber;
        $client->fax=$request->fax;
        $client->website=$request->website;
        
        $client->save();
        return json_encode(true);
        }
        public function deleteClient(Request $request){
        $clientId=$request->id;
        $client=client::findOrFail($clientId);
        $client->delete();
        return json_encode(true);
        }
    
}
