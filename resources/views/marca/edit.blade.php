@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>

{!! Form::model($marca, [
    'method' => 'PATCH',
    'route' => ['marca.update', $marca->id]
]) !!}

<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Fabricante</b>
		<input type="text" name="marca" id="marca" value="{{ $marca->marca }}">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Editando fabricante {{ $marca->marca }}');
	});
</script>

@stop