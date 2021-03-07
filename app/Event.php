<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected  $table = 'events';

     
     
     
        public function Eventpricing()
     {
       return $this->hasMany('App\EventPricing', 'Training_Event_Code', 'No');
     }
}
