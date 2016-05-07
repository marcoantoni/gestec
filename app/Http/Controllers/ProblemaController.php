<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Responsavel;
use App\Problema;
use App\Http\Requests;
use Session;
use Validator;


class ProblemaController extends Controller {
    
	/*public function index() {
	    $f = Funcionario::getFuncionarioInformacao();
    	return view('funcionario.index')->with('funcionarios', $f);
	   
	}*/

    public function create() {
    	$r = Responsavel::get();
    	return view('problema.create')->with('responsavel', $r);
    }

	public function store(Request $request) {
		$prob = new Problema;
		
		$rules = ['descricao' => 'required|min:5',
				'id_responsavel' => 'integer|required',
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$r = Responsavel::get();
    		return view('problema.create')->with(['errors' => $errors->errors()->all(), 'responsavel' => $r]);
	    } else {
	    	$prob->descricao = $request->input('descricao');
	    	$prob->id_responsavel = $request->input('id_responsavel');
			$prob->save();
			return redirect('emprestimo.index');
	    }
	}


	//public function show($id){
	//	$h = Emprestimo::getHistFunc($id);
	  // 	return response()->json($h);
	//}

	public function destroy($id) {
	    $f = Funcionario::findOrFail($id);
	    $f->delete();
	    return redirect('funcionario');
	}

	public function edit($id) {
		$p = Problema::findOrFail($id);
		$r = Responsavel::get();
	    return view('problema.edit')->with(['problema' => $p, 'responsavel' => $r]);
	}

	public function update($id, Request $request) {
		
		$f = Funcionario::findOrFail($id);
		
		$rules = ['nome' => 'required|min:5',
				'matricula' => 'integer|required',
				'id_lotacao' => 'integer|required',
				'id_cargo' => 'integer|required',
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$l = Lotacao::getLotacao();
		    $f = Funcionario::findOrFail($id);
		    $t = Cargo::get();
	        return view('funcionario.create')->with(['errors' => $errors->errors()->all(), 'lotacao' => $l, 'cargos' => $t]);
	    } else {
	    	$f->nome = $request->input('nome');
	    	$f->cpf = $request->input('cpf');
	    	$f->rg = $request->input('rg');
	    	$f->matricula = $request->input('matricula');
	    	$f->id_lotacao = $request->input('id_lotacao');
	    	$f->id_cargo = $request->input('id_cargo');
	    	$f->email = $request->input('email');
	    	$f->telefone = $request->input('telefone');
	    	$f->ativo = $request->input('ativo');
			$f->save();
			return redirect('funcionario');
		}	
	}

	public function getProblemas($id_responsavel){
		$prob = Problema::getProblemas($id_responsavel);
		return response()->json($prob);
	}

}
