<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function block()
    {
        return $this->belongsTo(Block::class,'block_id');
    }
}
