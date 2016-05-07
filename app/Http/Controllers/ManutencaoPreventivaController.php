<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Preventiva;
use App\Lotacao;
use DateTime;


class ManutencaoPreventivaController extends Controller {

	public function index(){
		$man = Preventiva::get();
		$lotacao = Lotacao::get();
		return view('manutencao.index')->with(['manutencao' => $man, 'lotacao' => $lotacao]);
	}

	public function show($id){
		$man = Preventiva::getManutencaoFeita($id);
		return response()->json($man);
	}

	public function create(){
		return view ("manutencao.create");
	}

	public function store(Request $request){
		$prev = new Preventiva();
		$prev->id = $request->input("id");
		$prev->detalhes = $request->input("detalhes");
		$prev->save();
	}

	public function andamento($ano, $id_lotacao){
		$prev = Preventiva::getAndamento($ano, $id_lotacao);
		return response()->json($prev);
	}

	public function getDetalhes($ano){
		$manutencao = Preventiva::findOrFail($ano);
		return response()->json($manutencao);
	}

	

	
}
