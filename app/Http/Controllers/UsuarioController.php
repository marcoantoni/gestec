<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;
use Session;
use Validator;
use Hash;
use Illuminate\Foundation\Http\FormRequest;
use App\Users;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Config;

use Auth;



class UsuarioController extends Controller {

    public function getIndex()
    {
        return View::make('hello');
    }
 
    public function getEntrar()
    {
        $titulo = 'Entrar - Desenvolvendo com Laravel';
        return view('usuario/login');
    }
 
    public function postEntrar(Request $request)
    {
        // Opção de lembrar do usuário
        $remember = false;
       
        $login = $request->input('login');
        $senha = $request->input('senha');

        Session::put('usuario', $login);
          return redirect('chamados');


       // return $login . " " . $senha;
      //  return ( "$login $senha");
        // Autenticação
        if (Auth::attempt(['login' => $login, 'senha' => $senha])) {
            // Authentication passed...
         //return $request->user(); //"sim";
            //return 'login ok';
           session(['usuario' => $login]);
        return redirect('chamados');
        } else {
           // return Hash::make('1234');
            return "nao";
           // return redirect('entrar')->with('error', 1);
        }
    }
    
    public function getSair()
    {
        Auth::logout();
        return redirect('entrar');
    }
}
