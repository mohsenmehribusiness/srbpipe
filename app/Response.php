<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
  public $guarded=['id'];
  protected $table='response';
  protected  $fillable=['description','send_id'];
  /* 	id 	description 	created_at 	updated_at 	send_id  */
}