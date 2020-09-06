<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  public $guarded=['id'];
  protected $table='section';
  protected  $fillable=['name','description','state','list','img'];
  /*id '.'name '.'description'.'state '.'created_at'.'updated_at'.'list'.'img*/
}