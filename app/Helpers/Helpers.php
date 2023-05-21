<?php

namespace App\Helpers;

use App\Models\User;

class Helpers
{
    public static function getUserName($id)
    {
        return User::find($id)->name;
    } 

}
