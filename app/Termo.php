<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Termo extends Model {
   	
   	protected $table = 'termo';
   	public $timestamps = false;

   	public static function getTermo($id){
   		return DB::select("SELECT nome, emprestimo.entregue, texto FROM emprestimo, funcionario, termo WHERE emprestimo.id_termo_emprestimo = 1 AND emprestimo.id_termo_emprestimo = 1 AND funcionario.id = emprestimo.id_devedor ");

   	}

}
