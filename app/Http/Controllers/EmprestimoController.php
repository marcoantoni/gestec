<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Emprestimo;
use App\Equipamento;
use App\DetalheEmprestimo;
use App\Funcionario;
use App\Http\Requests;
use Session;
use Validator;

use DateTime;


class EmprestimoController extends Controller {
    
	public function index() {
		return view('emprestimo.index'); 
	}

    public function create() {
    	$f = Funcionario::get();
    	$e = Emprestimo::getDisponiveis();
    	$tt = null;//Termo::get();

    	return view('emprestimo.create')->with(['funcionarios' => $f, 'equipamentos' => $e, 'tipo_termo' => $tt]);
    }

	public function store(Request $request) {
		//$ids =  $request->input('id_equipamento');
		//return response()->json($ids);
		$e = new Emprestimo;
		
		$rules = [];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$f = Funcionario::get();
    		$e = Equipamento::getOrderByPatrimonio();
    		//$tt = TipoTermo::get();
    		return view('emprestimo.create')->with(['errors' => $errors->errors()->all(), 'funcionarios' => $f, 'equipamentos' => $e]);
	    } else {
			
			// hora local	    	
	    	$dt = new DateTime;
            $e->entregue = $dt->format('y-m-d');
            $e->id_responsavel_entrega = 7; 
            $e->id_devedor = $request->input('id_devedor'); 
	    	$e->observacao = $request->input('observacao');
			$e->save();

			$id_selecionados = $request->input('id_equipamento');
			// get id_emprestimo
			$id_emprestimo = $e->max('id');

			for ($i = 0; $i < count($id_selecionados); $i++){
				// inserindo na tabela detalhe_emprestimo
				$detalheEmprestimo = new DetalheEmprestimo;
				$detalheEmprestimo->id_equipamento = $id_selecionados[$i];
				$detalheEmprestimo->id_emprestimo = $id_emprestimo;
				$detalheEmprestimo->devolucao = NULL;
				$detalheEmprestimo->save();//$id_emprestimo;
				
				// atualizar status para emprestado do equipamento
				$equipamento = Equipamento::findOrFail($id_selecionados[$i]);
				$equipamento->emprestado = 1;
				$equipamento->save();
			}

			return redirect('emprestimos');
	    }
	}

	public function update($id, Request $request){
		$dt = new DateTime;
        $agora = $dt->format('d-m-y');
      
		$emprestimo = Emprestimo::findOrFail($id);
		
		$observacaoAntiga = $emprestimo->observacaoentrega;
		$observacaoAtual = $request->input('observacao');
		$novaObservacao = $observacaoAntiga ."<br>$agora: ". $observacaoAtual;
		//return $novaObservacao;
		$emprestimo->observacao =  $novaObservacao;
		$emprestimo->save;
		
		$id_selecionados = $request->input('id_equipamento');
		for ($i = 0; $i < count($id_selecionados); $i++){
				// inserindo na tabela detalhe_emprestimo
				$detalheEmprestimo = new DetalheEmprestimo;
				$detalheEmprestimo->id_equipamento = $id_selecionados[$i];
				$detalheEmprestimo->id_emprestimo = $id;
				$detalheEmprestimo->devolucao = NULL;
				$detalheEmprestimo->save();//$id_emprestimo;
				
				// atualizar status para emprestado do equipamento
				$equipamento = Equipamento::findOrFail($id_selecionados[$i]);
				$equipamento->emprestado = 1;
				$equipamento->save();
			}

			return redirect('emprestimos');
	}

	public function destroy($id) {
	    $e = Equipamento::findOrFail($id);
	    $e->delete();
	    return redirect('equipamento');
	}

	public function edit($id) {
		$f = Funcionario::get();
    	$e = Emprestimo::getDisponiveis();
    	$emprestimo = Emprestimo::findOrFail($id);

    	return view('emprestimo.edit')->with(['funcionarios' => $f, 'equipamentos' => $e, 'emprestimo' => $emprestimo]);
	}

	public function devolver($id_emprestimo, $id_notebook, $observacao){

		$equipamento = Equipamento::findOrFail($id_notebook);
		$equipamento->emprestado = 0;
		$equipamento->save();

		$detalheEmprestimo = DetalheEmprestimo::atualizar($id_emprestimo, $id_notebook, $observacao);

		return response()->json($detalheEmprestimo);

	}

	function pesquisarEmprestimos($filtro, $limite){
		$pesquisa = DetalheEmprestimo::pesquisarEmprestimos($filtro, $limite);
		return response()->json($pesquisa);
	}

	public function show($id){
		$emprestimo = Emprestimo::getInfo($id);
		$detalhe_emprestimo = DetalheEmprestimo::getDetalhes($id);

		return view('emprestimo.show')->with(['emprestimo' => $emprestimo, 'detalhe_emprestimo' => $detalhe_emprestimo]);
	}
}
