<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use App\Http\Requests;
use App\TipoEquipamento;
use Validator;
use Session;


class TipoEquipamentoController extends Controller {
    
	public function index() {
		$tipo = TipoEquipamento::orderBy('tipo', 'asc')->get();
		return view('tipoequipamento.index')->with('tipoequipamento', $tipo);
	}

    public function create() {
    
    }

	public function store(Request $request) {
		
	}


	public function show($id){
	
	}

	public function destroy($id) {
	   
	}

	public function edit($id) {
	   
	}

	public function update($id, Request $request) {
	   
	}

}
