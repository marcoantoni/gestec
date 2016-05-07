<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class DetalheEmprestimo extends Model {
   	
   	protected $table = 'detalhe_emprestimo';
   	public $timestamps = false;

   	//public static function getProblemas($id_responsavel){
   	//	 return DB::select("SELECT id, descricao FROM problema WHERE id_responsavel = $id_responsavel ORDER BY descricao ASC");
   	//}

   	public static function pesquisarEmprestimos($filtro, $limite, $patrimonio=NULL){

      if ($patrimonio){
        $condicao = " patrimonio = $patrimonio AND ";
      } else {
        $condicao = " ";
      }

      // 1 nao devolvidos
      // 2 devolvidos
      // 
      if ($filtro == 1)
        $sql = "SELECT id_emprestimo, id_equipamento, patrimonio, modelo, marca, DATE_FORMAT(entregue, '%d/%m/%Y às %H:%m') AS entregue, (SELECT nome FROM funcionario where id = id_devedor) AS nome FROM detalhe_emprestimo, equipamento, modelo, marca, emprestimo, tipo_equipamento WHERE $condicao detalhe_emprestimo.id_equipamento = equipamento.id AND detalhe_emprestimo.id_emprestimo = emprestimo.id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND modelo.id_tipo_equipamento = tipo_equipamento.id AND devolucao IS NULL LIMIT $limite";
      if ($filtro == 2)
        $sql = "SELECT id_emprestimo, id_equipamento, patrimonio, modelo, marca, DATE_FORMAT(entregue, '%d/%m/%Y às %H:%m') AS entregue, DATE_FORMAT(devolucao, '%d/%m/%Y às %H:%m') AS devolucao, (SELECT nome FROM funcionario where id = id_devedor) AS nome FROM detalhe_emprestimo, equipamento, modelo, marca, emprestimo, tipo_equipamento WHERE detalhe_emprestimo.id_equipamento = equipamento.id AND detalhe_emprestimo.id_emprestimo = emprestimo.id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND modelo.id_tipo_equipamento = tipo_equipamento.id AND detalhe_emprestimo.devolucao IS NOT NULL LIMIT $limite";
      if ($filtro == 3)
        $sql = "SELECT nome,email,telefone,id_equipamento,matricula,id_devedor FROM detalhe_emprestimo, equipamento,emprestimo, funcionario WHERE patrimonio = $patrimonio AND funcionario.id = id_devedor AND detalhe_emprestimo.id_equipamento = equipamento.id AND detalhe_emprestimo.id_emprestimo = emprestimo.id AND devolucao IS NULL LIMIT 1";

      return DB::select("$sql");
    }

    public static function atualizar($id_emprestimo, $id_equipamento, $observacao){
      $sql = "UPDATE detalhe_emprestimo SET observacao = '$observacao', devolucao = now() WHERE id_emprestimo = $id_emprestimo AND id_equipamento = $id_equipamento ";
      return DB::update($sql);
    }

    public static function getDetalhes($id){
      $sql = "SELECT id_emprestimo, id_equipamento, tipo_equipamento.tipo, modelo, marca, DATE_FORMAT(devolucao, '%d/%m/%Y às %H:%m') AS devolucao, detalhe_emprestimo.observacao, modelo.caracteristicas FROM tipo_equipamento, modelo, marca, equipamento, detalhe_emprestimo WHERE detalhe_emprestimo.id_emprestimo = $id AND equipamento.id_modelo = modelo.id AND modelo.id_marca = marca.id AND modelo.id_tipo_equipamento = tipo_equipamento.id AND id_equipamento = equipamento.id";

        return DB::select($sql);
    }

     public static function getHistEquip($id){

      return DB::select("SELECT nome, DATE_FORMAT(entregue, '%d/%m/%Y às %H:%m') AS entregue, DATE_FORMAT(devolucao, '%d/%m/%Y às %H:%m') AS devolucao, emprestimo.observacao as obs_entrega, detalhe_emprestimo.observacao as obs_devolucao FROM emprestimo, detalhe_emprestimo, equipamento, funcionario WHERE equipamento.id = $id AND emprestimo.id = detalhe_emprestimo.id_emprestimo AND detalhe_emprestimo.id_equipamento = equipamento.id and funcionario.id = emprestimo.id_devedor ");

   }
   
   public static function getHistFunc($id){
      
      return DB::select("SELECT modelo, marca, tipo_equipamento.tipo, DATE_FORMAT(entregue, '%d/%m/%Y às %H:%m') AS entregue, DATE_FORMAT(devolucao, '%d/%m/%Y às %H:%m') AS devolucao FROM emprestimo, detalhe_emprestimo, equipamento, modelo, marca, tipo_equipamento WHERE emprestimo.id_devedor = $id AND emprestimo.id = detalhe_emprestimo.id_emprestimo AND detalhe_emprestimo.id_equipamento = equipamento.id AND equipamento.id_modelo = modelo.id AND modelo.id_tipo_equipamento = tipo_equipamento.id AND modelo.id_marca = marca.id ");
    }

}
