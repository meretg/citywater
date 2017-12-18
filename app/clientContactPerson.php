<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientContactPerson extends Model
{
  public $table="clientContactPersons";

  public function client(){
      return $this->belongTo('App\client');
  }
}
