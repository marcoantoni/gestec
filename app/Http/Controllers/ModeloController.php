<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Marca;
use App\Modelo;
use App\TipoEquipamento;
use App\Http\Requests;
use Session;
use Validator;


class ModeloController extends Controller {
    
	public function index() {
	    $m = Modelo::get();

    	return view('modelo.index')->with('modelos', $m);
	   
	}

    public function create() {
    	$m = Marca::get();
    	$te = TipoEquipamento::get();

    	return view('modelo.create')->with(['marcas' => $m, 'tipos' => $te]);
    }

	public function store(Request $request) {
		$m = new Modelo;
		
		$rules = ['modelo' => 'required',
				'id_marca' => 'integer|required'
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$m = Marca::get();
	        return view('modelo.create')->with(['errors' => $errors->errors()->all(), 'marcas' => $m]);
	    } else {
	    	$m->modelo = $request->input('modelo');
	    	$m->caracteristicas = $request->input('caracteristicas');
	    	$m->id_marca = $request->input('id_marca');
	    	$m->id_tipo_equipamento = $request->input('id_tipo_equipamento');
	    	$m->valor = $request->input('valor');
			$m->save();
			return redirect('modelos');
	    }
	}


	public function show($id){
		$m = Modelo::findOrFail($id);
    	return view('modelo.index')->with('modelos', $m);
	}

	public function destroy($id) {
	    $m = Modelo::findOrFail($id);
	    $m->delete();
	    return redirect('modelos');
	}

	public function edit($id) {
	    $modelo = Modelo::findOrFail($id);
	    $marca = Marca::get();
	    $te = TipoEquipamento::get();
	    return view('modelo.edit')->with(['modelo' => $modelo, 'marcas' => $marca, 'tipos' => $te]);
	}

	public function update($id, Request $request) {
		
		$m = Modelo::findOrFail($id);
		
		$rules = ['modelo' => 'required',
				'id_marca' => 'integer|required'
			];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	    	$m = Marca::get();
	        return view('modelo.create')->with(['errors' => $errors->errors()->all(), 'marcas' => $m]);
	    } else {
	    	$m->modelo = $request->input('modelo');
	    	$m->caracteristicas = $request->input('caracteristicas');
	    	$m->id_marca = $request->input('id_marca');
	    	$m->id_tipo_equipamento = $request->input('id_tipo_equipamento');
	    	$m->valor = $request->input('valor');
			$m->save();
			return redirect('modelos');
	    }
	}

	public function getValor($id){
		$inf = Modelo::getValor($id);
		return response()->json($inf);
	}

	public function getQuantidade($id){
		//return "ola mundo $id";
		$quantidade = Modelo::getQuantidade();
		return response()->json($quantidade);
	}

}
