<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Marca;
use Validator;
use Session;


class MarcaController extends Controller {
    
	public function index() {
	    $m = Marca::get();

    	return view('marca.index')->with('marca', $m);
	   
	}

    public function create() {
    	return view('marca.create');
    }

	public function store(Request $request) {
		$m = new Marca;
		
		$rules = ['marca' => 'required'];

	    $errors = Validator::make($request->all(), $rules);

	    if ($errors->fails()) {
	        return view('marca.create')->with('errors', $errors->errors()->all());
	    } else {
	    	$m->marca = $request->input('marca');
			$m->save();
			return redirect('marca');
	    }
	}

	public function destroy($id) {
	    $m = Marca::findOrFail($id);
	    $m->delete();
	    return redirect('marca');
	}

	public function edit($id) {
	    $m = Marca::findOrFail($id);
	    return view('marca.edit')->with('marca', $m);
	}

	public function update($id, Request $request) {
	    $m = Marca::findOrFail($id);

	    $rules = ['marca' => 'required'];

	    $errors = Validator::make($request->all(), $rules);

	 	if ($errors->fails()) {
	 		return view('marca.edit')->with(['errors' => $errors->errors()->all(), 'marca' => $m]);
	    } else {
	    	$m->marca = $request->input('marca');
			$m->save();
			return redirect('marca');
	    }
	}

}
