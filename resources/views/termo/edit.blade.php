@extends('layouts.master')

@section('content')

<h1>Devolução</h1>
<p class="lead">Devolvendo equipamento</p>
<hr>	

{!! Form::model($emprestimo, [
    'method' => 'PATCH',
    'route' => ['emprestimos.update', $emprestimo->id]
]) !!}
    @foreach ($inf as $i)
        Deseja devolver o patrimônio <b>{{ $i->patrimonio }}</b>, modelo <b>{{ $i->modelo }}</b>, marca <b>{{ $i->marca }}</b> emprestado para <b>{{ $i->nome }}</b>?
    @endforeach
    <br/>
    <br/>
    {!! Form::submit('Devolver', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop