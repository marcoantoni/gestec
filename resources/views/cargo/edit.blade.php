@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>	

{!! Form::model($cargo, [
    'method' => 'PATCH',
    'route' => ['cargos.update', $cargo->id]
]) !!}

<fieldset>
	<label class="ls-label col-md-6">
		<b class="ls-label-text">Lotação</b>
		<input type="text" name="cargo" id="cargo" value="{{ $cargo->cargo }}">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Editando {{ $cargo->cargo }}');
	});
</script>

@stop