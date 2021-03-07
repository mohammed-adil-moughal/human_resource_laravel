<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberBilling extends Model
{
    public function BillingType()
    {
        return $this->hasOne('App\BillingType', 'Code', 'Type');
    }
}
