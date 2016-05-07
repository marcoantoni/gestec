<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\Cargo;
use Validator;
use Session;


class CargoController extends Controller {
    
	public function index() {
	    $c = Cargo::get();

    	return view('cargo.index')->with('cargos', $c);
	   
	}

    public function create() {
    	return view('cargo.create');
    }

	public function store(Request $request) {
		$c = new Cargo;

    	$c->cargo = $request->input('cargo');
		$c->save();
		return redirect('cargos');
   
	}


	public function show($id){
		$c = Cargo::findOrFail($id);
    	return view('cargo.index')->with('cargo', $c);
	}

	public function destroy($id) {
	    $l = Lotacao::findOrFail($id);
	    $l->delete();
	    return redirect('lotacao');
	}

	public function edit($id) {
	    $c = Cargo::findOrFail($id);
	    return view('cargo.edit')->with('cargo', $c);
	}

	public function update($id, Request $request) {
	    $c = Cargo::findOrFail($id);
		$c->cargo = $request->input('cargo');
		$c->save();
		return redirect('cargos');
		
	}

}
