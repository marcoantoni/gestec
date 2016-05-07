<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Equipamento extends Model {
   	
   	protected $table = 'equipamento';
   	public $timestamps = false;

   	public static function getOrderByPatrimonio($id_situacao=null){
   		return DB::select("SELECT equipamento.id, patrimonio, id_modelo, serial_hw, serial_so, equipamento.observacao, modelo.valor, modelo, marca FROM equipamento, modelo, marca WHERE  equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id ORDER BY patrimonio ASC");
         // AND equipamento.id_situacao = 1
   //      id_situacao = $id_situacao  AND
   	}

   	public static function getInfo($id){
   		return DB::select("SELECT equipamento.id, patrimonio, id_modelo, serial_hw, serial_so, equipamento.observacao, id_so, emprestado, equipamento.valor, modelo, marca, sistemaoperacional, arquitetura, tipo_equipamento.tipo AS tipo_equipamento, ip, mac, hostname FROM equipamento, modelo, marca, sistemaoperacional, arquitetura, tipo_equipamento WHERE equipamento.id = $id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND id_so = sistemaoperacional.id AND sistemaoperacional.id_arquitetura = arquitetura.id AND modelo.id_tipo_equipamento = tipo_equipamento.id");
   	}

      public static function getHistoricoChamados($id_equipamento){
         return DB::select("SELECT 
              problema, observacaoentrega, observacaodevolucao, DATE_FORMAT(aberto, '%d/%m/%Y às %H:%m') AS aberto, DATE_FORMAT(inicio_atendimento, '%d/%m/%Y às %H:%m') AS inicio_atendimento, DATE_FORMAT(fim_atendimento, '%d/%m/%Y às %H:%m') AS fim_atendimento, solucao, id_manutencao_preventiva, ocomon, (SELECT nome FROM funcionario WHERE id_devedor = funcionario.id) AS usuario, (SELECT descricao FROM problema WHERE id_problema = problema.id) AS categoriaproblema, (SELECT nome FROM funcionario WHERE id_tecnico = funcionario.id) AS tecnico FROM chamado WHERE id_equipamento = $id_equipamento");
      }
}
