<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class SistemaOperacional extends Model {
   	
   	protected $table = 'sistemaoperacional';
   	public $timestamps = false;

   	public static function get(){
   		return DB::select("SELECT sistemaoperacional.*, arquitetura FROM sistemaoperacional, arquitetura WHERE id_arquitetura = arquitetura.id ORDER BY sistemaoperacional ASC");
   	}

}
