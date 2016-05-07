@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>
<a href="{{ route('modelos.create') }}" class="ls-btn-primary">Adicionar novo modelo</a>

<table class="ls-table table-hover ls-bg-header printable">
  	<thead>
	    <tr>
	      	<td>Tipo</td>
			<td>Modelo</td>
			<td>Marca</td>
			<td>Quantidade</td>
			<td>Caracteristícas</td>
			<td>Valor</td>
			<td>Mais</td>
	    </tr>
  	</thead>
  	<tbody>	
	@foreach($modelos as $modelo)
	    <tr>
			<td>{{ $modelo->tipo }}</td>
			<td>{{ $modelo->modelo }}</td>
			<td>{{ $modelo->marca }}</td>
			<td id="modelo{{ $modelo->id }}"></td>
			<td>{{ $modelo->caracteristicas }}</td>
			<td>{{ $modelo->valor }}</td>
			<td>
				<div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
					<a href="#" class="ls-btn ls-btn-sm"></a>
					<ul class="ls-dropdown-nav">
					<li><a href="{{ route('modelos.edit', $modelo->id) }}">Editar</a></li>
					<li>
						{!! Form::open(['method' => 'DELETE', 'route' => ['funcionarios.destroy', $modelo->id], 'id' => 'delete-form']) !!}
		       			<a href="#" onclick="document.getElementById('delete-form').submit()" class="ls-color-danger" title="Lembre-se: Não é possível excluír um registro depois que já tiver outros associados a este">Excluir</a>
	        			{!! Form::close() !!}
					</li>
					</ul>
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<script>
	$( document ).ready(function() {
  		
  		setTitulo('Modelos de equipamentos disponíveis');
  		
  		 $.get('modelos/quantostem/1', function (response) {
	        $.each(response, function (key, value) {
	        	$('#modelo'+value.id_modelo).append('<td>'+value.quantidade+'</td>');
      		});
	    });
	});
</script>
@stop