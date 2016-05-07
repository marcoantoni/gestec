@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>

{!! Form::model($modelo, [
    'method' => 'PATCH',
    'route' => ['modelos.update', $modelo->id],
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
    <label class="ls-label col-md-4">
        <b class="ls-label-text">Tipo equipamento</b>
        <div class="ls-custom-select">
            <select class="ls-select" name="id_tipo_equipamento" id="id_tipo_equipamento" required>
                @foreach($tipos as $t)
                    @if ($t->id == $modelo->id_tipo)
                        <option value="{{ $t->id }} selected">{{ $t->tipo }}</option>
                    @else
                         <option value="{{ $t->id }}">{{ $t->tipo }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </label>

    <label class="ls-label col-md-3">
        <b class="ls-label-text">Tipo equipamento</b>
        <div class="ls-custom-select">
            <select class="ls-select" name="id_marca" required>
                @foreach($marcas as $marca)
                    @if ($marca->id == $modelo->id_marca)
                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                    @else
                       <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </label>
    
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Modelo</b>
        <input type="text" id="modelo" name="modelo" value="{{  $modelo->modelo }}" required>
    </label>

    <label class="ls-label col-md-2">
        <b class="ls-label-text">Valor</b>
       <input type="text" id="valor" name="valor" value="{{  $modelo->value }}">
    </label>

     <label class="ls-label col-md-12">
        <b class="ls-label-text">Caracteristícas</b>
        <textarea name="caracteristicas" id="caracteristicas" class="form-control" rows="3">{{  $modelo->caracteristicas }}</textarea>
    </label>
    <div class="ls-float-right">
        <input type="submit" class="ls-btn-primary" value="Salvar">
    </div>
</fieldset>

{!! Form::close() !!}
<script>
    $( document ).ready(function() {
        $('#oculto').hide();
        setTitulo('Editando modelo {{  $modelo->modelo }}');
    });
</script>

@stop