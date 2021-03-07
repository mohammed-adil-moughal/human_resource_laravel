<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBookingEntry extends Model
{
    protected $table="event_booking_entry";

    protected  $fillable = array('Member_No','Event_Code', 'Membership_Type','Names','Registration_Type','Address',
       'ID_Number','Registration_No','Contact_Person','Phone_No','Post_Code','City','E_mail',
        'PIN_Registration_No');

  
      
    public function Delegates()
    {
      return $this->hasMany('App\EventBookingEntryDelegates','Event_booking_entry');
     }
    public function Event()
    {
      return $this->hasOne('App\Event', 'No', 'Event_Code');
     }
     
}
