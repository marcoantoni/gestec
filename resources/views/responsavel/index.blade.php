@extends('layouts.master')

@section('content')
<h1>Listagem lotação</h1>
<p class="lead"><a href="{{ route('lotacao.create') }}" class="glyphicon glyphicon-plus">Adicionar</a></p>

<table class="table table-hover">
<tr>
	<td>Lotação</td>
	<td>Apagar</td>
	<td>Alterar</td>
</tr>
@foreach($lotacao as $l)
    <tr>
		<td>{{ $l->lotacao }}</td>
		<td>
	        {!! Form::open(['method' => 'DELETE', 'route' => ['lotacao.destroy', $l->id], 'id' => 'delete-form']) !!}
		       <a href="#" onclick="document.getElementById('delete-form').submit()" class="glyphicon glyphicon-remove" style="color: red;"></a>
	        {!! Form::close() !!}
	    </td>
	    <td>
	        <a href="{{ route('lotacao.edit', $l->id) }}" class="glyphicon glyphicon-pencil"></a>
	    </td>
@endforeach
</table>
@stop