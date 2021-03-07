<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBookingEntryDelegates extends Model
{
    protected $table="event_booking_delegates";
  
   protected  $fillable = array('PIN_Registration_No','Id_Number', 'Mobile','E_mail','Names','Comments','Member_No','Event_booking_entry');
}
