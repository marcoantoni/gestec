@extends('layouts.master')

@section('content')

<h1>Modo edição</h1>
<p class="lead">Editando "{{ $lotacao->lotacao }}"</p>
<hr>	

{!! Form::model($lotacao, [
    'method' => 'PATCH',
    'route' => ['lotacao.update', $lotacao->id]
]) !!}

<div class="form-group">
    {!! Form::label('lotacao', 'Lotação:', ['class' => 'control-label']) !!}
    {!! Form::text('lotacao', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop