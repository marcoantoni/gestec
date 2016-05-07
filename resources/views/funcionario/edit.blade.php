@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-users">Editando o funcionário "{{ $funcionario->nome }}"</h1>

{!! Form::model($funcionario, [
    'method' => 'PATCH',
    'route' => ['funcionarios.update', $funcionario->id], 
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
	<label class="ls-label col-md-4">
		<b class="ls-label-text">Nome</b>
	<input type="text" id="nome" name="nome" placeholder="Nome" value="{{ $funcionario->nome }}" required>
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Matrícula</b>
		<input type="number" id="matricula" name="matricula" value="{{ $funcionario->matricula }}">

	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">CPF</b>
		<input type="text" id="cpf" name="cpf" value="{{ $funcionario->cpf }}">
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">RG</b>
		<input type="text" id="rg" name="rg" value="{{ $funcionario->rg }}">
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">Lotação</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_lotacao">
				@foreach($lotacao as $l)
					@if ($l->id == $funcionario->id_lotacao)
						<option value="{{ $l->id }}" selected>{{ $l->lotacao }}</option>
					@else
						<option value="{{ $l->id }}">{{ $l->lotacao }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</label>
		
	<label class="ls-label col-md-4">
		<b class="ls-label-text">Cargo</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_cargo">
				@foreach($cargos as $cargo)
					@if ($cargo->id == $funcionario->id_cargo)
						<option value="{{ $cargo->id }}" selected>{{ $cargo->cargo }}</option>
					@else
						<option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">Email</b>
		<input type="email" id="email" name="email" value="{{ $funcionario->email }}">
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Telefone</b>
		<input type="tel" id="telefone" name="telefone" value="{{ $funcionario->telefone }}">
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