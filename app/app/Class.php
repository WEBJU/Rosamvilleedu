<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
  public function students(){
    return $this->belongsToMany(Student::class);
  }
  public function teachers(){
    return $this->belongsToOne(Teachers::class);
  }
}
