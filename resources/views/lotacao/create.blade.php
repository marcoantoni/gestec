@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-home" id="titulo"></h1>
<a href="{{ route('lotacao.index') }}" class="ls-btn-primary">Lotações disponíveis</a> 

{!! Form::open([
    'route' => 'lotacao.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}

<fieldset>
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Lotação</b>
		<input type="text" name="lotacao" id="lotacao">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>
{!! Form::close() !!}
<script>
	$( document ).ready(function() {
  		setTitulo('Adicionando nova lotação');
	});
</script>

@stop