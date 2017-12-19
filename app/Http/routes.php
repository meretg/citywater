<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcom');
// });
/*client Controller*/
Route::get('deleteClient/{id}','clientController@deleteClient');
Route::get('getClient/{id}','clientController@getClient');
Route::get('updateClient/{id}','clientController@updateClient');
Route::get('addClient','clientController@addClient');

/*ClientContactPerson Controller*/
Route::get('addClientContactPerson/{id}','clientContactPersonController@addClientContactPerson');
Route::get('getClientContactPerson/{id}','clientContactPersonController@getClientContactPerson');
Route::get('updateClientContactPerson/{id}','clientContactPersonController@updateClientContactPerson');
Route::get('deleteContactPerson/{id}','clientContactPersonController@deleteContactPerson');

/*Activity Controller*/
Route::get('createActivity/{type}/{status}/{textInput}/{comments}','activityController@createActivity');
Route::get('showActivity/{id}','activityController@showActivity');
Route::get('showclientActivity','activityController@showclientActivity');
/*RFQ*/
Route::get('createRFQ/{type}/{status}/{RFQ_description}/{clientId}','RFQController@createRFQ');
Route::get('showRFQ','RFQController@showRFQ');
Route::get('deleteRFQ/{id}','RFQController@deleteRFQ');
Route::get('updateRFQ/{id}/{serial}/{type}/{status}/{RFQ_description}/{clientId}','RFQController@updateRFQ');
/*Quotation*/
Route::get('showQuotation/{id}','QuotationController@showQuotation');
Route::get('deleteQuotation/{id}','QuotationController@deleteQuotation');
Route::get('updateQuotation/{id}/{serial}/{status}/{clientId}/{RFQId}','QuotationController@updateQuotation');
/*materialList*/
Route::get('showMaterialList/{id}','materialListController@showMaterialList');
Route::get('createMaterialList/{serial}/{item}/{quantity}/{purpose}/{price}/{sellingPrice}/{quotationId}','materialListController@createMaterialList');
Route::get('deleteMaterialList/{id}','materialListController@deleteMaterialList');
Route::get('updateMaterialList/{id}/{item}/{quantity}/{purpose}/{price}/{sellingPrice}/{quotationId}','materialListController@updateMaterialList');
