<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name','state_id','district_id','duration','sponcered_by','start_date'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
    ];
    
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}
