<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    public function subjects(){
      return $this->hasMany(Subject::class);
    }
}
