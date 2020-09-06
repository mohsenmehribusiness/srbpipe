<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  public $guarded=['id'];
  protected $table='setting';
  protected  $fillable=['catalog','laboratory','product','section1','section2','iso','image','map'];
  /* 		['catalog','laboratory','product','section1','section2','iso','image','map']*/
}