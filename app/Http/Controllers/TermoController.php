<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Termo;

class TermoController extends Controller {
    public function index() {
	 
	   
	}

    public function create() {
    
    	return view('termo.create');
    }

	public function store(Request $request) {
	
	}


	public function show($id){
		$termo = Termo::getTermo($id);

		return view('termo.show')->with('termo',$termo);
	}

	public function destroy($id) {
	   
	}

	public function edit($id) {
		
	}

	public function update($id, Request $request) {

	}
		
	
}
