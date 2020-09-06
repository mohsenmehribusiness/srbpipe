<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
  public $guarded=['id'];
  protected $table='send';
  protected  $fillable=['name','email','description','state'];
  /* ['id','name ','email','description','state'] */
}