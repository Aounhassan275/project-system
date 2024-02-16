<?php

namespace App\Helpers;

use App\Models\Block;
use App\Models\GramPanchyat;
use App\Models\User;
use App\Models\Village;

class Helpers
{
    public static function getUserName($id)
    {
        return User::find($id)->name;
    } 
    public static function getBlockName($id)
    {
        return Block::find($id)->name ?? null;
    } 

    public static function getGPName($id)
    {
        return GramPanchyat::find($id)->name ?? null;
    } 

    public static function getVillageName($id)
    {
        return Village::find($id)->name ?? null;
    } 

    public static function getMonths()
    {
        return [
          'Jan',  
          'Feb',  
          'March',  
          'April',  
          'May',  
          'June',  
          'July',  
          'August',  
          'Sep',  
          'Oct',  
          'Nov',  
          'Dec',  
        ];
    } 

}
