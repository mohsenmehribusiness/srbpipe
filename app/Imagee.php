<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Imagee extends Model
{
  public $guarded=['id'];
  protected $table='images';
    protected  $fillable=['img','name','description','tags','state'];
  /* id 	img 	tags 	description  */
}