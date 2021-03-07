<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberSubscription extends Model
{
    public function SubscriptionPeriod()
    {
        return $this->hasOne('App\SubscriptionPeriod', 'Code', 'Subscription_Period');
    }
}
