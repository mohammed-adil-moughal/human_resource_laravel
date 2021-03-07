<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public static function setPasswordResetToken(User $user)
    {
        $password_reset = PasswordReset::where('email', $user->email );
        if(!$password_reset)
        {
            $password_reset = new PasswordReset();
            $password_reset->email = $user->email;
        }

    }
}
