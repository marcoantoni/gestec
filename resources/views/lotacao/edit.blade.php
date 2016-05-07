@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>	

{!! Form::model($lotacao, [
    'method' => 'PATCH',
    'route' => ['lotacao.update', $lotacao->id]
]) !!}

<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Lotação</b>
		<input type="text" name="lotacao" id="lotacao" value="{{ $lotacao->lotacao }}">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Editando {{ $lotacao->lotacao }}');
	});
</script>

@stop