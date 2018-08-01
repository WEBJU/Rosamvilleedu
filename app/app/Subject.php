<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teachers(){
      return $this->belongsToMany(Teachers::class);
    }
}
