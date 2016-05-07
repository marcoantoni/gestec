<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Preventiva extends Model {
   	
   	protected $table = 'manutencao_preventiva';
   	public $timestamps = false;

   	public static function get(){
   		return DB::select("SELECT * FROM manutencao_preventiva ORDER BY id DESC");
   	}

   	public static function getAndamento($ano, $id_lotacao){
   		
   		if ($id_lotacao == 0){
   			$sql = "SELECT chamado.id AS id_chamado, nome, lotacao, fim_atendimento, patrimonio, equipamento.id AS id_equipamento FROM chamado, emprestimo, detalhe_emprestimo, funcionario, lotacao, equipamento WHERE chamado.id_manutencao_preventiva = $ano AND chamado.id_equipamento = detalhe_emprestimo.id_equipamento AND emprestimo.id = detalhe_emprestimo.id_emprestimo AND detalhe_emprestimo.devolucao IS NULL AND funcionario.id = chamado.id_devedor AND funcionario.id_lotacao = lotacao.id AND detalhe_emprestimo.id_equipamento = equipamento.id";
   		} else {
   			$sql = "SELECT chamado.id AS id_chamado, nome, lotacao, fim_atendimento, patrimonio, equipamento.id AS id_equipamento FROM chamado, emprestimo, detalhe_emprestimo, funcionario, lotacao, equipamento WHERE chamado.id_manutencao_preventiva = $ano AND chamado.id_manutencao_preventiva = $ano AND funcionario.id_lotacao = $id_lotacao AND chamado.id_equipamento = detalhe_emprestimo.id_equipamento AND emprestimo.id = detalhe_emprestimo.id_emprestimo AND detalhe_emprestimo.devolucao IS NULL AND funcionario.id = chamado.id_devedor AND funcionario.id_lotacao = lotacao.id AND detalhe_emprestimo.id_equipamento = equipamento.id";
         }   

   		return DB::select($sql);
   	}

      public static function quemPrecisaManutencao(){
         return DB::select("SELECT funcionario.id AS id_devedor, nome, detalhe_emprestimo.id_equipamento FROM funcionario, equipamento, emprestimo, detalhe_emprestimo WHERE funcionario.id = emprestimo.id_devedor AND emprestimo.id = detalhe_emprestimo.id_emprestimo AND detalhe_emprestimo.id_equipamento = equipamento.id AND detalhe_emprestimo.devolucao is null");
      }

}
