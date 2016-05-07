@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>	
<a href="{{ route('lotacao.create') }}" class="ls-btn-primary">Adicionar nova lotação</a> 

<table class="ls-table table-hover ls-bg-header">
  <thead>
    <tr>
      <th>Lotação</th>
      <th>Mais</th>
    </tr>
  </thead>
  <tbody>
		@foreach($lotacao as $l)
		<tr>
			<td>{{ $l->lotacao }}</td>

			<td>
				<div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
					<a href="#" class="ls-btn ls-btn-sm"></a>
					<ul class="ls-dropdown-nav">
					<li><a href="{{ route('lotacao.edit', $l->id) }}">Editar</a></li>
					<li>
						{!! Form::open(['method' => 'DELETE', 'route' => ['funcionarios.destroy', $l->id], 'id' => 'delete-form']) !!}
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
  		setTitulo('Lotações disponíveis');
	});
</script>
@stop