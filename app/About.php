<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  public $guarded=['id'];
  protected $table='webinfo';
  protected  $fillable=['title','map_link','map_img','header','manage','fax','url','id','name','mobile','phone','telegram','instagram','address','tags','about','logo','facebook','twitter','email'];
  /*	['fax','id' ,'	name ' ,'	mobile ' ,'	' ,'phone ' ,'	telegram ' ,'	instagram ' ,'	address 	' ,'tags 	' ,'about ' ,'	logo ' ,'	facebook 	' ,'twitter ' ,'	email ']*/
}