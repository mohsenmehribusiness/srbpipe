<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class catalog extends Model
{
  public $guarded=['id'];
  protected $table='catalog';
    protected  $fillable=['name','description','img','file'];
   /* 'id','name','created_at','updated_at','description','img','file'  */
}