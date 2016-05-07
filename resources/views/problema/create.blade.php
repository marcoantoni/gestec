@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-shaft-up-right" id="titulo"></h1>
<a href="{{ route('problemas.create') }}" class="ls-btn-primary">Adicionar nova categoria</a>

{!! Form::open([
    'route' => 'problemas.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
	<label class="ls-label col-md-7">
        <b class="ls-label-text">Descrição do problema</b>
        <input type="text" name="descricao" placeholder="Ex: instalação de software, confiração de serviço web" required>
    </label>

    <label class="ls-label col-md-5">
        <b class="ls-label-text">Área responsável</b>
        <div class="ls-custom-select">
            <select name="id_responsavel" required>
                @foreach($responsavel as $r)
					<option value="{{ $r->id }}">{{ $r->responsavel }}</option>
				@endforeach
            </select>
        </div>
    </label>

    <div class="ls-float-right">
        <input type="submit" class="ls-btn-primary" value="Salvar">
    </div>
</fieldset>


{!! Form::close() !!}
<script>
    $( document ).ready(function() {
    setTitulo('Adicionando nova categoria de problemas');
    });
</script>

@stop