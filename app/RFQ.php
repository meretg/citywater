<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
  public $table="RFQs";
  protected $dates = ['created_at'];
  
  public function client(){
      return $this->belongTo('App\client');
  }
}
