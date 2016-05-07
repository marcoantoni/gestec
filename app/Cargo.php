<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {
   	
   	protected $table = 'cargo';
   	public $timestamps = false;

   	public static function get(){
   		return cargo::orderBy('id', 'ASC')->get();
   	}

}
