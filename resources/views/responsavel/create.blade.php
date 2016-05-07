@extends('layouts.master')

@section('content')

<h1>Adicionar nova área responsável</h1>
<p class="lead">Exemplo: Almoxarifado, educação</p>
<hr>

{!! Form::open([
    'route' => 'responsavel.store'
]) !!}

<div class="form-group">
    {!! Form::label('responsavel', 'Área responsável:', ['class' => 'control-label']) !!}
    {!! Form::text('responsavel', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop