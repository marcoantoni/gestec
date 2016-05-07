<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model {
   	
   	protected $table = 'marca';
   	public $timestamps = false;

   	public static function get(){
   		return Marca::orderBy('marca', 'ASC')->get();
   	}

}
