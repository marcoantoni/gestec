@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>
<a href="{{ route('cargos.index') }}" class="ls-btn-primary">Ver cargos existentes</a>
{!! Form::open([
    'route' => 'cargos.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}

<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Cargo</b>
		<input type="text" name="cargo" id="cargo">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}
<script>
	$( document ).ready(function() {
  		setTitulo('Adicionando novo cargo');
	});
</script>

@stop