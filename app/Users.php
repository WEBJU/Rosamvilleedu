<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function teachers(){
        return $this->belongsToOne(Teachers::class);
    }
}
