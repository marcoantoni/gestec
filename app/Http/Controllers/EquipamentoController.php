<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Equipamento;
use App\Emprestimo;
use App\DetalheEmprestimo;
use App\Modelo;
use App\SistemaOperacional;
use App\Situacao;
use App\Http\Requests;
use Session;
use Validator;


class EquipamentoController extends Controller {
    
	public function index() {
	    $e = Equipamento::getOrderByPatrimonio(1);
	    $situacao = Situacao::where('controle', 1)->get();
    	return view('equipamento.index')->with(['equipamentos' => $e,  'situacao' => $situacao]);
	   
	}

	public function show($id){
		$e = Equipamento::getInfo($id);
		$historicoChamados = Equipamento::getHistoricoChamados($id);
		return view('equipamento.show')->with(['equipamento' => $e, 'historiCochamados' => $historicoChamados]);
	}

    public function create() {
    	$m = Modelo::get(null);
    	$sistemas = SistemaOperacional::get();
    	$situacao = Situacao::where('controle', 1)->get();
    	return view('equipamento.create')->with(['modelos' => $m, 'sistemas' => $sistemas, 'situacao' => $situacao]);
    }

	public function store(Request $request) {
		$e = new Equipamento;
		
		$rules = ['patrimonio' => 'integer|required',
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$m = Modelo::get();
	        return view('equipamento.create')->with(['errors' => $errors->errors()->all(), 'modelos' => $m]);
	    } else {
	    	$e->patrimonio = $request->input('patrimonio');
	    	$e->id_modelo = $request->input('id_modelo');
	    	$e->emprestado = 0;
	    	$e->observacao = $request->input('observacao');
	    	$e->serial_hw = $request->input('serialhw');
	    	$e->id_so = $request->input('idsistemaoperacional');
	    	$e->serial_so = $request->input('serialso');
	    	$e->ip = $request->input('ip');
	    	$e->hostname = $request->input('hostname');
	    	$e->mac = $request->input('mac');
	    	$e->id_situacao = $request->input('id_situacao');
			$e->save();
			return redirect('equipamentos');
	    }
	}



	public function destroy($id) {
	    $e = Equipamento::findOrFail($id);
	    $e->delete();
	    return redirect('equipamentos');
	}

	public function edit($id) {
		$e = Equipamento::findOrFail($id);
		$m = Modelo::get();
		$sistemas = SistemaOperacional::get();
		$situacao = Situacao::where('controle', 1)->get();
	    return view('equipamento.edit')->with(['equipamento' => $e, 'modelos' => $m, 'sistemas' => $sistemas, 'situacao' => $situacao]);
	}

	public function update($id, Request $request) {
		
		$e = Equipamento::findOrFail($id);
		
		$rules = ['patrimonio' => 'integer|required'
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$m = Modelo::get();
	        return view('equipamento.create')->with(['errors' => $errors->errors()->all(), 'modelos' => $m]);
	    } else {
	    	$e->patrimonio = $request->input('patrimonio');
	    	$e->id_modelo = $request->input('id_modelo');
	    	$e->emprestado = 0;
	    	$e->observacao = $request->input('observacao');
	    	$e->serial_hw = $request->input('serialhw');
	    	$e->id_so = $request->input('idsistemaoperacional');
	    	$e->serial_so = $request->input('serialso');
	    	$e->ip = $request->input('ip');
	    	$e->hostname = $request->input('hostname');
	    	$e->mac = $request->input('mac');
	    	$e->id_situacao = $request->input('id_situacao');
			$e->save();
			return redirect('equipamentos');
	    }	
	}

	public function getHistorico($id){
		$h = DetalheEmprestimo::getHistEquip($id);
	   	return response()->json($h);
	}


	public function getInfDevedor($patrimonio){
		$inf = DetalheEmprestimo::pesquisarEmprestimos(3, 1, $patrimonio);
		return response()->json($inf);
	}

	public function getEquipamento($id){
		$inf = Modelo::get($id);
		return response()->json($inf);
	}

	public function filtroSituacao($id_situacao){
		$e = Equipamento::getOrderByPatrimonio($id_situacao);
		return response()->json($e);
	}

	public function atualizarinfo($token, $resposta, $patrimonio, $ip, $mac, $hostname){

		$respostaValida = ((($token % 3)*3)*8);

		if ($respostaValida == $resposta){
			$equipamento = Equipamento::where('patrimonio', $patrimonio)->first();
			$equipamento->ip = $ip;
			$equipamento->mac = $mac;
			$equipamento->hostname = $hostname;
			$equipamento->save();

			return 200;
		}


		return 500;
		


	}

}
