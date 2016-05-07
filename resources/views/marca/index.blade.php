@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>
<a href="{{ route('marca.create') }}" class="ls-btn-primary">Adicionar novo fabricante</a> 

<table class="ls-table ls-xs-space table-hover ls-bg-header">
<thead>
	<tr>
		<td>Fabricante</td>
		<td>Mais</td>
	</tr>
</thead>
@foreach($marca as $m)
    <tr>
		<td>{{ $m->marca }}</td>
		<td>
				<div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
					<a href="#" class="ls-btn ls-btn-sm"></a>
					<ul class="ls-dropdown-nav">
					<li><a href="{{ route('marca.edit', $m->id) }}">Editar</a></li>
					<li>
						{!! Form::open(['method' => 'DELETE', 'route' => ['marca.destroy', $m->id], 'id' => 'delete-form']) !!}
		       			<a href="#" onclick="document.getElementById('delete-form').submit()" class="ls-color-danger" title="Lembre-se: Não é possível excluír um registro depois que já tiver outros associados a este">Excluir</a>
	        			{!! Form::close() !!}
					</li>
					</ul>
				</div>
			</td>
	</tr>
@endforeach
</table>
<script>
	$( document ).ready(function() {
  		setTitulo('Marcas de equipamentos disponíveis');
	});
</script>
@stop