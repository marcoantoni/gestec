<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Lotacao;
use Validator;
use Session;


class LotacaoController extends Controller {
    
	public function index() {
	    $l = Lotacao::getLotacao();

    	return view('lotacao.index')->with('lotacao', $l);
	   
	}

    public function create() {
    	return view('lotacao/create');
    }

	public function store(Request $request) {
		$l = new Lotacao;
		
		$rules = ['lotacao' => 'required|min:5'];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	        return view('lotacao.create')->with('errors', $errors->errors()->all());
	    } else {
	    	$l->lotacao = $request->input('lotacao');
			$l->save();
			return redirect('lotacao');
	    }
	}


	public function show($id){
		$l = Lotacao::findOrFail($id);
    	return view('lotacao.index')->with('lotacao', $l);
	}

	public function destroy($id) {
	    $l = Lotacao::findOrFail($id);
	    $l->delete();
	    return redirect('lotacao');
	}

	public function edit($id) {
	    $l = Lotacao::findOrFail($id);
	    return view('lotacao.edit')->with('lotacao', $l);
	}

	public function update($id, Request $request) {
	    $lotacao = Lotacao::findOrFail($id);
		
		$rules = ['lotacao' => 'required|min:5'];

	    $errors = Validator::make($request->all(), $rules);

	 	if ($errors->fails()) {
	 		return view('lotacao.edit')->with(['errors' => $errors->errors()->all(), 'lotacao' => $lotacao]);
	    } else {
	    	$lotacao->lotacao = $request->input('lotacao');
			$lotacao->save();
			return redirect('lotacao');
	    }
	}

}
