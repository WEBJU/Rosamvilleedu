<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    public function subjects(){
      return $this->hasMany(Subject::class);
    }

    public function users(){
      return $this->hasOne(Users::class);
    }

    public function classess(){
      return $this->hasOne(Teachers::class);
    }
}
