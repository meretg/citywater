<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materialList extends Model
{
  public $table="QuotationMaterialLists";
  public function Quotation(){
      return $this->belongTo('App\Quotation');
  }

}
