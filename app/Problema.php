<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Problema extends Model {
   	
   	protected $table = 'problema';
   	public $timestamps = false;

   	public static function getProblemas($id_responsavel){
   		 return DB::select("SELECT id, descricao FROM problema WHERE id_responsavel = $id_responsavel ORDER BY descricao ASC");
   	}

}
