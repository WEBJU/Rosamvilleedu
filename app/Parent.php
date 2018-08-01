<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
  public function students(){
    return $this->hasMany(Student::class);
  }

}
