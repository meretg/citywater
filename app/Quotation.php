<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
  public $table="QuotationRFQs";
  public function client(){
      return $this->belongTo('App\client');
  }
  public function RFQ(){
      return $this->belongTo('App\RFQ');
  }
  public function materialList(){
      return $this->hasMany('App\materialList');
  }
}
