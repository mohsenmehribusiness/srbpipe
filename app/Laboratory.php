<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class laboratory extends Model
{
  public $guarded=['id'];
  protected $table='laboratory';
  protected  $fillable=['name','description','img'];
}