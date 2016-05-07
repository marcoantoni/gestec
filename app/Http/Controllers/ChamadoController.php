<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Chamado;
use App\Lotacao;
use App\Preventiva;
use App\Responsavel;
use Auth;
use DateTime;
use Session;
use Validator;


class ChamadoController extends Controller {


	public function index(){
		$r = Responsavel::get();
		return view('chamado.index')->with('responsavel', $r);
	}

	public function create(){
		$r = Responsavel::get();
		$l = Lotacao::getLotacao();
    	return view('chamado.create')->with(['responsavel' => $r, 'lotacao' => $l]);
	}

	public function store(Request $request) {
		$chamado = new Chamado;
		
		$rules = ['problema' => 'min:10',
				'id_devedor' => 'integer|required',
				'id_problema' => 'integer|required'
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	        $r = Responsavel::get();
	        $l = Lotacao::getLotacao();
    		return view('chamado.create')->with(['responsavel' => $r, 'lotacao' => $l, 'errors' => $errors->errors()->all()]);
	    } else {

	    	if ($request->input('id_equipamento'))	
	    		$chamado->id_equipamento = $request->input('id_equipamento');
	    	else
	    		$chamado->id_equipamento = null;
	    	
	    	$chamado->id_tecnico = 2; // pegar da sessao
	    	$chamado->id_devedor = $request->input('id_devedor');;
	    	$chamado->id_problema = $request->input('id_problema');
	    	$chamado->problema = $request->input('problema');
	    	
	    	if ($request->input('id_manutencao_preventiva')){
		    	$chamado->id_manutencao_preventiva = $request->input('id_manutencao_preventiva');
		    }
		    
	    	$chamado->ocomon = 0; //$request->input('ocomon');
	    	

	    	// hora local	    	
	    	$dt = new DateTime;
            $chamado->aberto = $dt->format('y-m-d');

            $chamado->observacaoentrega = $request->input('observacaoentrega');
			
			$chamado->save();
			return redirect('chamados');
	    }
	}

	public function show($id){
		$c = Chamado::getChamadoDetalhado($id);
		return view('chamado.show')->with('chamado', $c);

	}

	public function edit($id){
		$chamado = Chamado::findOrFail($id);
		return view('chamado.edit')->with('chamado', $chamado);

	}

	public function update($id, Request $request) {
		$chamado = Chamado::findOrFail($id);
		$dt = new DateTime;
		$chamado->fim_atendimento = $dt->format('y-m-d H-m');
		$chamado->solucao = $request->input('solucao');
		$chamado->observacaodevolucao = $request->input('observacaodevolucao');

		$chamado->save();
		return redirect('chamados');
	}

	public function pesquisarChamados($id_responsavel, $filtro, $limite){
		$pesquisa = Chamado::pesquisarChamados($id_responsavel, $filtro, $limite);
		return response()->json($pesquisa);
	}

	public function atender($id){
		$chamado = Chamado::findOrFail($id);

		$dt = new DateTime;
		$chamado->inicio_atendimento = $dt->format('y-m-d H-m');
		$chamado->save();
		return redirect('chamados');
	}

	public function Coletivo($id_problema, $problema, $ano=null){
		$id_problema = (int)($id_problema);
		$ano = (int)($ano);
	
		$infochamado = Preventiva::quemPrecisaManutencao();

		foreach ($infochamado as $info){
			$chamado = new Chamado;
			$chamado->id_equipamento = $info->id_equipamento;
			$chamado->id_devedor = $info->id_devedor;
		
            if ($ano > 0)
	            $chamado->id_manutencao_preventiva = $ano;

	    	$chamado->id_problema = $id_problema;
	    	$chamado->problema = $problema;
	    	$chamado->id_tecnico = 1;
			$dt = new DateTime;
            $chamado->aberto = $dt->format('y-m-d');
	    	$chamado->save();
		}
		return response()->json('sucesso');
	}

	
}
