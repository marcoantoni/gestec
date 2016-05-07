@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>
<a href="{{ route('marca.index') }}" class="ls-btn-primary">Ver todos fabricantes disponíveis</a>

{!! Form::open([
    'route' => 'marca.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Fabricante</b>
		<input type="text" name="marca" id="marca">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Adicionar nova marca de equipamento');
	});
</script>

@stop