<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Emprestimo extends Model {
   	
   	protected $table = 'emprestimo';
   	public $timestamps = false;

   	
      public static function getDevInfo($id){
         return DB::select("SELECT patrimonio, modelo, marca, nome FROM emprestimo, equipamento, modelo, marca, historico, funcionario WHERE emprestimo.id = $id AND emprestimo.id_equipamento = equipamento.id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND equipamento.id = historico.id_equipamento AND historico.id_funcionario = funcionario.id");
      }

    public static function getDisponiveis(){
   		return Equipamento::where('emprestado', '=', 0)->orderBy('patrimonio', 'ASC')->get(); 
   	}

   	public static function getEmprestados(){
   		return DB::select("SELECT emprestimo.id as id_emprestimo, equipamento.id as id_equipamento, patrimonio, modelo, marca, entregue, nome, funcionario.id as id_funcionario FROM equipamento, modelo, marca, emprestimo, funcionario WHERE equipamento.emprestado = 1 AND emprestimo.id_equipamento = equipamento.id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND equipamento.id AND devolucao IS NULL AND emprestimo.id_devedor = funcionario.id ");
   	}

    public static function getInfo($id){
      $sql = "SELECT emprestimo.id, (SELECT nome FROM funcionario WHERE id = id_devedor) AS responsavel, (SELECT nome FROM funcionario WHERE id = id_responsavel_entrega) AS responsavel_entrega, observacao, entregue FROM emprestimo WHERE id = $id";

      return DB::select($sql);
    }
}
