<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classess extends Model
{

  //class relates to teachers
  public function teachers(){
    return $this->belongsToOne(classess::class);

  }

    protected $table = "classes";

}
