<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('entrar', 'UsuarioController@getEntrar');
Route::post('entrar', 'UsuarioController@postEntrar');
Route::get('sair', 'UsuarioController@getSair');


Route::get('equipamentos/atualizar/{token}/{resposta}/{patrimonio}/{ip}/{mac}/{hostname}', 'EquipamentoController@atualizarinfo');



Route::resource('usuarios', 'UsuarioController');



Route::get("/", "ChamadoController@index");

Route::resource('cargos', 'CargoController');
Route::resource('chamados', 'ChamadoController');
Route::resource('emprestimos', 'EmprestimoController');
Route::resource('equipamentos', 'EquipamentoController');
Route::resource('funcionarios', 'FuncionarioController');
Route::resource('lotacao', 'LotacaoController');
Route::resource('manutencao', 'ManutencaoPreventivaController');
Route::resource('marca', 'MarcaController');
Route::resource('modelos', 'ModeloController');
Route::resource('responsavel', 'ResponsavelController');
Route::resource('problemas', 'ProblemaController');
Route::resource('tipoequipamento', 'TipoEquipamentoController');


Route::get('/funcionarios/ver/todos/', 'FuncionarioController@todos');
Route::get('/funcionarios/getchamados/{id_usuario}', 'FuncionarioController@getChamados');

// Ajax routes
Route::get('/devolver/{id_emprestimo}/{id_notebook}/{observacao}', 'EmprestimoController@devolver');
Route::get('/manutencao/andamento/{ano}/{id_lotacao}', 'ManutencaoPreventivaController@andamento');
Route::get('/manutencao/detalhes/{getDetalhes}', 'ManutencaoPreventivaController@getDetalhes');


Route::get('usuarios/atualizartema/{id_usuario}/{tema}', 'UsuarioController@atualizarTema');
Route::get('/emprestimos/pesquisar/{filtro}/{limite}', 'EmprestimoController@pesquisarEmprestimos');

Route::get('problema/getproblemas/{id_responsavel}', 'ProblemaController@getProblemas');
Route::get('equipamentos/comquemesta/{patrimonio}', 'EquipamentoController@getInfDevedor');
Route::get('/equipamentos/historico/{id}', 'EquipamentoController@getHistorico');
Route::get('equipamentos/getequipamento/{id}', 'EquipamentoController@getEquipamento');
Route::get('equipamentos/situacao/{id_situacao}', 'EquipamentoController@filtroSituacao');
Route::get('modelos/quantocusta/{id}', 'ModeloController@getValor');
Route::get('modelos/quantostem/{id}', 'ModeloController@getQuantidade');
Route::get('/chamados/pesquisar/{id_responsavel}/{filtro}/{limite}', 'ChamadoController@pesquisarChamados');
Route::get('/chamados/atender/{id}', 'ChamadoController@atender');
Route::get('chamados/abrircoletivo/{id_problema}/{problema}/{ano}', 'ChamadoController@Coletivo');
Route::get('/funcionarios/historico/{id}', 'FuncionarioController@getHistorico');
Route::get('/funcionarios/nome/{termo}', 'FuncionarioController@pesquisarFuncionarios');
Route::get('/funcionarios/pesquisarinfo/{matricula}', 'FuncionarioController@getDados');



