<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondentMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','block_id','district_id','gram_panchyat_id','village_id','gender','age','education',
        'number_family_member','caste','religion','farmer_id'
    ];
    public function block()
    {
        return $this->belongsTo(Block::class,'block_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function gram_panchyat()
    {
        return $this->belongsTo(GramPanchyat::class,'gram_panchyat_id');
    }
    public function village()
    {
        return $this->belongsTo(Village::class,'village_id');
    }

}