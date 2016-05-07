<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Responsavel extends Model {
   	
   	protected $table = 'responsavel';
   	public $timestamps = false;

   	public static function get(){
   		 return DB::select("select * from responsavel order by responsavel asc");
   	}

}
