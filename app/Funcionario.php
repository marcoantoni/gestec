<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Funcionario extends Model {
   	
   	protected $table = 'funcionario';
   	public $timestamps = false;

   	public static function getOrderByName(){
   		return Funcionario::orderBy('nome', 'ASC')->get();
   	}

      public static function get(){
         return Funcionario::orderBy('nome', 'ASC')->get();
      }
      
   	public static function getFuncionarioInformacao($id = NULL){
   		if ($id == NULL){
            $sql = "SELECT funcionario.id, nome, matricula, lotacao, cargo FROM funcionario, lotacao, cargo WHERE funcionario.id_lotacao = lotacao.id AND cargo.id = funcionario.id_cargo";
         } else {
             $sql = "SELECT funcionario.id, nome, matricula, lotacao, cargo, rg, cpf, telefone, email FROM funcionario, lotacao, cargo WHERE funcionario.id = $id AND funcionario.id_lotacao = lotacao.id AND cargo.id = funcionario.id_cargo";
         }
         return DB::select($sql);
   	}
}
