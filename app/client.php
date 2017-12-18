<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public $table="clients";
    public $timestamps=false;
    protected $fillable = [
        'code',
        'companyName',
        'email',
        'phoneNumber',
        'address',
        'fax',
        'website'
           ];
    public function activity(){
        return $this->hasMany('App\activity');
    }
    public function clientContactPerson(){
        return $this->hasMany('App\clientContactPerson');
    }
    public function RFQ(){
        return $this->hasMany('App\RFQ');
    }

}
