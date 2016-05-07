<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Responsavel;
use Validator;
use Session;


class ResponsavelController extends Controller {
    
	//public function index() {
    //	return view('responsavel.index');
	   
	//}

    public function create() {
    	return view('responsavel/create');
    }

	public function store(Request $request) {
		$res = new Responsavel;
		
		$rules = ['responsavel' => 'required|min:5'];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	        return view('responsavel.create')->with('errors', $errors->errors()->all());
	    } else {
	    	$res->responsavel = $request->input('responsavel');
			$res->save();
			return redirect('/');
	    }
	}


	public function show($id){
		
	}

	public function destroy($id) {
	   //$l = Lotacao::findOrFail($id);
	   // $l->delete();
	   // return redirect('lotacao');
	}

	public function edit($id) {
	  //  $l = Lotacao::findOrFail($id);
//return view('lotacao.edit')->with('lotacao', $l);
	}

	public function update($id, Request $request) {
	   /* $lotacao = Lotacao::findOrFail($id);
		
		$rules = ['lotacao' => 'required|min:5'];

	    $errors = Validator::make($request->all(), $rules);

	 	if ($errors->fails()) {
	 		return view('lotacao.edit')->with(['errors' => $errors->errors()->all(), 'lotacao' => $lotacao]);
	    } else {
	    	$lotacao->lotacao = $request->input('lotacao');
			$lotacao->save();
			return redirect('lotacao');
	    }*/
	}

}
