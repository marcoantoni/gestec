<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Chamado extends Model {
   	
   	protected $table = 'chamado';
   	public $timestamps = false;

   	public static function getChamados(){
   		return cargo::orderBy('id', 'ASC')->get();
   	}

   	public static function pesquisarChamados($id_responsavel, $filtro, $limite){

         if ($id_responsavel != 0){
            $condicao1 = "AND problema.id_responsavel = $id_responsavel ";
         } else {
            $condicao1 = " ";
         }

   		// 1 abertos
   		// 2 fechados
   		// 3 todos
   		$condicao2 = "";
   		if ($filtro == 1)
   			$condicao2 = "AND inicio_atendimento IS NULL ";
         else if ($filtro == 2)
            $condicao2 = "AND inicio_atendimento IS NOT NULL AND fim_atendimento IS NULL ";
         else if ($filtro == 3)
            $condicao2 = "AND fim_atendimento IS NOT NULL ";

   	  
       return DB::select("SELECT chamado.id, id_equipamento, (SELECT nome FROM funcionario WHERE id = id_devedor) AS usuario, (SELECT nome FROM funcionario WHERE id = id_tecnico) AS tecnico, id_problema, problema, observacaoentrega, DATE_FORMAT(aberto, '%d/%m/%Y') AS aberto, DATE_FORMAT(fim_atendimento, '%d/%m/%Y às %H:%m') AS encerrado, problema.descricao, solucao FROM chamado, problema WHERE id_problema = problema.id $condicao1 $condicao2 ORDER BY chamado.id DESC LIMIT $limite");
   	}

      public static function getChamadoDetalhado($id){
         $status = DB::select("SELECT id_equipamento FROM chamado WHERE  id = $id");

         if ($status[0]->id_equipamento == null){
            $sql = "SELECT chamado.id, chamado.id_equipamento, (SELECT nome FROM funcionario WHERE id = id_devedor) AS usuario, (SELECT nome FROM funcionario WHERE id = id_tecnico) AS tecnico, id_problema, problema, observacaoentrega, DATE_FORMAT(aberto, '%d/%m/%Y às %H:%m') AS aberto, DATE_FORMAT(inicio_atendimento, '%d/%m/%Y às %H:%m') AS inicio_atendimento,DATE_FORMAT(fim_atendimento, '%d/%m/%Y às %H:%m') AS fim_atendimento, problema.descricao, solucao, TIMESTAMPDIFF(MINUTE, fim_atendimento, inicio_atendimento) AS tempo FROM chamado, problema WHERE chamado.id = $id AND id_problema = problema.id";
         } else {
            $sql = "SELECT chamado.id, id_equipamento, modelo, marca, (SELECT nome FROM funcionario WHERE id = id_devedor) AS usuario, (SELECT nome FROM funcionario WHERE id = id_tecnico) AS tecnico, id_problema, problema, observacaoentrega,DATE_FORMAT(aberto, '%d/%m/%Y às %H:%m') AS aberto, DATE_FORMAT(inicio_atendimento, '%d/%m/%Y às %H:%m') AS inicio_atendimento,DATE_FORMAT(fim_atendimento, '%d/%m/%Y às %H:%m') AS fim_atendimento, problema.descricao, solucao, TIMESTAMPDIFF(MINUTE, fim_atendimento, inicio_atendimento) AS tempo, patrimonio FROM chamado, problema, equipamento, modelo, marca WHERE chamado.id = $id AND id_problema = problema.id AND chamado.id_equipamento = equipamento.id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id";
         }
         return DB::select($sql);
      }

}
