@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>
<a href="{{ route('modelos.index') }}" class="ls-btn-primary">Ver modelos</a>

{!! Form::open([
    'route' => 'modelos.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
    <label class="ls-label col-md-4">
        <b class="ls-label-text">Tipo equipamento</b>
        <div class="ls-custom-select">
            <select class="ls-select" name="id_tipo_equipamento" id="id_tipo_equipamento" required>
                @foreach($tipos as $t)
                    <option value="{{ $t->id }}">{{ $t->tipo }}</option>
                @endforeach
            </select>
        </div>
    </label>

    <label class="ls-label col-md-3">
        <b class="ls-label-text">Tipo equipamento</b>
        <div class="ls-custom-select">
            <select class="ls-select" name="id_marca" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                @endforeach
            </select>
        </div>
    </label>
    
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Modelo</b>
        <input type="text" id="modelo" name="modelo" required>
    </label>

    <label class="ls-label col-md-2">
        <b class="ls-label-text">Valor</b>
       <input type="text" id="valor" name="valor">
    </label>

     <label class="ls-label col-md-12">
        <b class="ls-label-text">Caracteristícas</b>
        <textarea name="caracteristicas" id="caracteristicas" class="form-control" rows="3"></textarea>
    </label>
    <div class="ls-float-right">
        <input type="submit" class="ls-btn-primary" value="Salvar">
    </div>
</fieldset>

{!! Form::close() !!}
<script>
    $( document ).ready(function() {
        $('#oculto').hide();
        setTitulo('Adicionando novo modelo de equipamento');
    });
</script>

@stop