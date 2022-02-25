<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    // province relationship
    public function provinces(){
        return $this->hasMany('App\Models\Province');
    }

}
