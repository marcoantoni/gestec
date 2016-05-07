<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Emprestimo;
use App\Funcionario;
use App\Lotacao;
use App\Cargo;
use App\DetalheEmprestimo;
use App\Http\Requests;
use Session;
use Validator;
use DB;
use App\Chamado;

class FuncionarioController extends Controller {
    
	public function index() {
    	return view('funcionario.index');
	   
	}

	public function todos() {
	    $f = Funcionario::getFuncionarioInformacao(null);
    	return view('funcionario.todos')->with('funcionarios', $f);
	   
	}

    public function create() {
    	$l = Lotacao::getLotacao();
    	$t = Cargo::get();
    	return view('funcionario.create')->with(['lotacao' => $l, 'cargos' => $t]);
    }

	public function store(Request $request) {
		$f = new Funcionario;
		
		$rules = ['nome' => 'required|min:5',
				'matricula' => 'integer|required',
				'id_lotacao' => 'integer|required',
				'id_cargo' => 'integer|required',
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$l = Lotacao::getLotacao();
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
	    	$f->id_situacao = 1; //$request->input('id_situacao');
			$f->save();
			return redirect('funcionarios');
	    }
	}


	public function show($id){
		$f = Funcionario::getFuncionarioInformacao($id);
		return view ('funcionario.show')->with('funcionario', $f);
	}

	public function destroy($id) {
	    $f = Funcionario::findOrFail($id);
	    $f->delete();
	    return redirect('funcionario');
	}

	public function edit($id) {
		$l = Lotacao::getLotacao();
	    $f = Funcionario::findOrFail($id);
	    $t = Cargo::get();
	    return view('funcionario.edit')->with(['lotacao' => $l, 'funcionario' => $f, 'cargos' => $t]);
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
	    	$f->id_situacao = 1; //$request->input('id_situacao');
			$f->save();
			return redirect('funcionarios');
		}	
	}

	public function getHistorico($id){
		$h = DetalheEmprestimo::getHistFunc($id);
	   	return response()->json($h);
	}

	public function getDados($matricula){
		$f = Funcionario::where('matricula', $matricula)->first();
		return response()->json($f);
	}

	public function pesquisarFuncionarios($termo){
		$f = DB::table('funcionario')->where('nome', 'LIKE', '%'.$termo.'%')->take(5)->get(); 
		return response()->json($f);
	}

	public function getChamados($id_usuario) {
		$chamado = DB::select("SELECT * FROM chamado WHERE id_devedor = $id_usuario");
		return response()->json($chamado);
	}

}
