<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ISo extends Model
{
  public $guarded=['id'];
  protected $table='iso';
    protected  $fillable=['img','name','description','tags','state'];
  /* id 	img 	tags 	description  */
}