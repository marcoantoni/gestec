@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-history" id="titulo"></h1>

{!! Form::open([
    'route' => 'manutencao.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}

   <label class="ls-label col-md-2">
        <b class="ls-label-text">Ano da manutenção</b>
        <input type="number" id="id" name="id">
    </label>


    <label class="ls-label col-md-12">
        <b class="ls-label-text">Detalhes do que deve ser feito</b>
        <textarea id="detalhes" name="detalhes" rows="3" contenteditable="true"></textarea>
    </label>
    
    <div class="ls-float-right">
        <input type="submit" class="ls-btn-primary" value="Salvar">
    </div>

{!! Form::close() !!}

<script>
    $( document ).ready(function() {
        setTitulo('Adicionando manutenção preventiva');
    });
</script>
    <!--<script type="text/javascript" src="{{ URL::to('/') }}/js/tinymce.min.js"></script>-->

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
       tinymce.init({
        selector: '#detalhes'
      });

</script>


@stop