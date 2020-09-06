<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $guarded=['id'];
  protected $table='product';
  protected  $fillable=['name','description','img'];
}