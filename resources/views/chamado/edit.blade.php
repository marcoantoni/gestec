@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-history" id="titulo"></h1>

{!! Form::model($chamado, [
    'method' => 'PATCH',
    'route' => ['chamados.update', $chamado->id],
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Solução</b>
		<textarea id="solucao" name="solucao" class="form-control" rows="3" contenteditable="true"></textarea>
	</label>

	<label class="ls-label col-md-12">
		<b class="ls-label-text">Observação</b>
		<textarea id="observacaodevolucao" name="observacaodevolucao" class="form-control" rows="3" contenteditable="true"></textarea>
	</label>

	<div id="ls-float-right">
	    <input type="submit" class="ls-btn-primary" value="Encerrar">
	</div>
</fieldset>

{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Encerrando o chamado número {{ $chamado->id }}');
	});
</script>
@stop