@extends('layouts.master')

@section('content')
<h1>Funcionários</h1>
<p class="lead"><a href="{{ route('funcionario.create') }}" class="glyphicon glyphicon-plus">Adicionar novo</a></p>

<table class="table table-hover">
<tr>
	<td>Nome</td>
	<td>Cargo</td>
	<td>Matrícula</td>
	<td>Lotação</td>
	<td>Apagar</td>
	<td>Editar</td>
</tr>
@foreach($funcionarios as $funcionario)
    <tr>
		<td><a href="#" title="Consultar quais equipamentos o usuário pegou emprestado" onClick="rastrearHistoricoFunc({{ $funcionario->id }})" data-toggle="modal" data-target="#modalhistorico">{{ $funcionario->nome }}</a>
		</td>
		<td>{{$funcionario->cargo }}</td>
		<td>{{ $funcionario->matricula }}</td>
		<td>{{ $funcionario->lotacao }}</td>
		<td>
	        {!! Form::open(['method' => 'DELETE', 'route' => ['funcionario.destroy', $funcionario->id], 'id' => 'delete-form']) !!}
		       <a href="#" onclick="document.getElementById('delete-form').submit()" class="glyphicon glyphicon-remove" style="color: red;" title="Lembre-se: Não é possível excluír um registro depois que já tiver outros associados a este"></a>
	        {!! Form::close() !!}
	    </td>
	    <td>
	        <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="glyphicon glyphicon-pencil" title="Editar"></a>
	    </td>

@endforeach
</table>
<!-- Modal-->
<div class="modal fade" id="modalhistorico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="limparHistorico()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Funcionário já pegou os seguintes equipamentos:</h4>
			</div>
			<div class="modal-body">
				<!-- Historico gravado dentro da div pelo jquery-->
				<div id="historico"></div>
			</div>
			<div class="modal-footer">
				<button type="button" id="limparHistorico" class="btn btn-default" data-dismiss="modal" onClick="limparHistorico()">Fechar</button>
			</div>
		</div>
	</div>
</div>
@stop