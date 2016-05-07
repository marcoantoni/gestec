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

class testeController extends Controller {

    public function index()
    {
        return view('teste.teste');
    }

    public function Coletivo($id_problema, $ano){

        //return "$id_problema, $ano";

        $infochamado = Preventiva::quemPrecisaManutencao();

        foreach ($infochamado as $info){
            $chamado = new Chamado;
            $chamado->id_equipamento = $info->id_equipamento;
            $chamado->id_devedor = $info->id_devedor;
        
            $dt = new DateTime;
            $chamado->aberto = $dt->format('y-m-d');

            $chamado->id_problema = $id_problema;
            $chamado->id_tecnico = 1;//$request->input('id_problema');
            
            $chamado->id_manutencao_preventiva = $ano;
            $chamado->save();
        }
        return response()->json('sucesso');
    }
}
