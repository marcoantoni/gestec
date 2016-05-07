@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>	
<a href="{{ route('cargos.create') }}" class="ls-btn-primary">Novo cargo</a>
<table class="ls-table table-hover ls-bg-header">
  <thead>
    <tr>
      <th>Cargo</th>
      <th>Mais</th>
    </tr>
  </thead>
  <tbody>
		@foreach($cargos as $cargo)
		<tr>
			<td>{{ $cargo->cargo }}</td>

			<td>
				<div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
					<a href="#" class="ls-btn ls-btn-sm"></a>
					<ul class="ls-dropdown-nav">
					<li><a href="{{ route('cargos.edit', $cargo->id) }}">Editar</a></li>
					<li>
						{!! Form::open(['method' => 'DELETE', 'route' => ['cargos.destroy', $cargo->id], 'id' => 'delete-form']) !!}
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
  		setTitulo('Cargos disponíveis');
	});
</script>
@stop