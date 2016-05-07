@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-shaft-up-right" id="titulo"></h1>

<div class="col-md-6">
	<h2>Adicionar novo</h2>
	{!! Form::open([
	    'route' => 'tipoequipamento.store',
	    'class' => 'ls-form ls-form-horizontal row',
	]) !!}
	<fieldset>
	    <label class="ls-label col-md-12">
	        <b class="ls-label-text">Tipo</b>
	        <input type="text" id="tipoequipamento" name="tipoequipamento">
	    </label>			    
	    <div class="ls-float-right">
	        <input type="submit" class="ls-btn-primary" value="Salvar">
	    </div>
	</fieldset>
	{!! Form::close() !!}
</div>
<div class="col-md-6">
	<h2>Existentes</h2>
	<table class="ls-table table-hover ls-bg-header printable">
		<thead>
			<th>Tipo</th>
		</thead>
		<tboby>	
			@foreach($tipoequipamento as $tipo)
				<tr><td>{{ $tipo->tipo }}</td></tr>
			@endforeach
		</tboby>	
	</table>
</div>

<script>
    $( document ).ready(function() {
    	setTitulo('Tipo de equipamento');
    });
</script>
@stop