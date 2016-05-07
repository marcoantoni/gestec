<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lotacao extends Model {
   	
   	protected $table = 'lotacao';
   	public $timestamps = false;

   	public static function getLotacao(){
   		return Lotacao::orderBy('lotacao', 'ASC')->get();
   	}

}
