<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'comunes';
    protected $guarded = ['id'];


    public function province(){
        return $this->belongsTo(\App\Models\Province::class, 'province_id', 'id');
    }
     
}
