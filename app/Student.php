<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable=[
      'surname',
      'middle_name',
      'last_name',
      'date_of_birth',
      'birth_place',
      'religion',
      'primary_school_attended',
      'medical_information',
      'boys_sibling',
      'girls_siblings',
      'family_relatives'
    ];
    public function parents(){
      return $this->belongsToOne(Parent::class);
    }
    public function fees(){
      return $this->hasOne(Fees::class);
    }
}
