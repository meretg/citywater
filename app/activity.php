<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
  public $table="activities";

  public function client(){
      return $this->belongTo('App\client');
  }
}
