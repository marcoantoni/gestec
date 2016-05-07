@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-users">Cadastrando novo funcionáio</h1>

{!! Form::open([
    'route' => 'funcionarios.store', 
    'class' => 'ls-form ls-form-horizontal row'
]) !!}	
<fieldset>
	<label class="ls-label col-md-4">
		<b class="ls-label-text">Nome</b>
	<input type="text" id="nome" name="nome" required>
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Matrícula</b>
		<input type="text" id="matricula" name="matricula">
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">CPF</b>
		<input type="text" id="cpf" name="cpf">
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">RG</b>
		<input type="text" id="rg" name="rg">
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">Lotação</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_lotacao">
			@foreach($lotacao as $l)
				<option value="{{ $l->id }}">{{ $l->lotacao }}</option>
			@endforeach
			</select>
		</div>
	</label>
		
	<label class="ls-label col-md-4">
		<b class="ls-label-text">Cargo</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_cargo">
				@foreach($cargos as $cargo)
					<option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
				@endforeach
			</select>
		</div>
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">Email</b>
		<input type="email" id="email" name="email">
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Telefone</b>
		<input type="tel" id="telefone" name="telefone">
	</label>

	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>

{!! Form::close() !!}
 <script type="text/javascript" src="{{ URL::to('/') }}/js/jquery.mask.min.js"></script>
 <script>
 	$(document).ready(function(){
		$("#cpf").mask("000.000.000-00", {reverse: true});
		$("#telefone").mask("(00) 0000-0000");
	});
 </script>
@stop