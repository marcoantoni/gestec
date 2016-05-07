@extends('layouts.master')

@section('content')

<h1>Modo edição</h1>
<p class="lead">Editando funcionário "{}}"</p>
<hr>	

{!! Form::model($problema, [
    'method' => 'PATCH',
    'route' => ['problema.update', $problema->id]
]) !!}

	<div class="form-group col-md-7">
		{!! Form::label('descricao', 'Descrição do problema:', ['class' => 'control-label']) !!}
		{!! Form::text('descricao', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-5">
		{!! Form::label('id_responsavel', 'Responsável:', ['class' => 'control-label']) !!}
		<select class="form-control" name="id_responsavel">
			@foreach($responsavel as $r)
				<option value="{{ $r->id }}">{{ $r->responsavel }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-md-12">
		{!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@stop