<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modelo extends Model {
   	
   	protected $table = 'modelo';
   	public $timestamps = false;

   	public static function get($id = NULL){

   		if ($id != NULL){
   			$sql = "SELECT modelo.*, marca, tipo_equipamento.tipo FROM modelo, marca, tipo_equipamento WHERE id_tipo_equipamento = $id AND marca.id = modelo.id_marca";
   		} else {
            $sql = "SELECT modelo.*, marca, tipo_equipamento.tipo, modelo.valor FROM modelo, marca, tipo_equipamento WHERE marca.id = modelo.id_marca AND modelo.id_tipo_equipamento = tipo_equipamento.id";
   			//$sql = "SELECT modelo.*, marca, tipo_equipamento.tipo, (SELECT sum(valor) FROM equipamentos) as subtotal FROM modelo, marca, tipo_equipamento WHERE marca.id = modelo.id_marca AND modelo.id_tipo_equipamento = tipo_equipamento.id ";
   		}
		    
         return DB::select($sql);
   	}

      public static function getValor($id){
         return DB::select("SELECT valor FROM modelo WHERE id = $id");
      }

      public static function getQuantidade(){

         return DB::select("SELECT `id_modelo`, COUNT(`id_modelo`) AS quantidade FROM equipamento GROUP BY `id_modelo`");
      }
}
