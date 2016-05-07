<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipamento extends Model {
   	
   	protected $table = 'tipo_equipamento';
   	public $timestamps = false;

   	public static function get(){
   		return TipoEquipamento::orderBy('id', 'ASC')->get();
   	}

}
