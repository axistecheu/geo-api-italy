<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function region(){
        return $this->belongsTo(\App\Models\Region::class, 'region_id', 'id');
    }
     
}
