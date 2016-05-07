@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>

{!! Form::open([
    'route' => 'equipamentos.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
  <label class="ls-label col-md-3">
	<b class="ls-label-text">Patrimônio</b>
	<input type="text" name="patrimonio" id="patrimonio">
  </label>

  <label class="ls-label col-md-4">
	<b class="ls-label-text">Serial do hardware</b>
		<input type="text" name="serialhw" id="serialhw">
  </label>

  <label class="ls-label col-md-5">
	<b class="ls-label-text">Situação</b>
	<div class="ls-custom-select">
	  <select id="id_situacao" name="id_situacao">
		<option value="0">Escolha</option>
		  @foreach ($situacao as $s)
		    <option value="{{ $s->id }}">{{ $s->situacao }}</option>
		  @endforeach
		</select>
	</div>
  </label>

  <label class="ls-label col-md-10">
	<b class="ls-label-text">Tipo / Marca / Modelo</b>
    <div class="ls-custom-select">
	  <select class="ls-select" id="id_modelo" name="id_modelo" required>
	    <option value="0">Escolha</option>
		  @foreach ($modelos as $modelo)
			<option value="{{ $modelo->id }}">{{ $modelo->tipo }} / {{ $modelo->marca }} / {{ $modelo->modelo }}</option>
		  @endforeach
		</select>
    </div>
  </label>


  <label class="ls-label col-md-2">
	<b class="ls-label-text">Valor equipamento</b>
	<input type="text" id="valor" name="valor">
  </label>

  <div id="oculto">
    <label class="ls-label col-md-7">
      <b class="ls-label-text">Sistema operacional / arquitetura</b>
      <div class="ls-custom-select">
        <select id="idsistemaoperacional" name="idsistemaoperacional">
          <option value="0">Escolha</option>
            @foreach ($sistemas as $sistema)
              <option value="{{ $sistema->id }}">{{ $sistema->sistemaoperacional }} / {{ $sistema->arquitetura }}</option>
            @endforeach
          </select>
      </div>
    </label>

    <label class="ls-label col-md-5">
      <b class="ls-label-text">Serial do sistema operacional instalado</b>
      <input type="text" name="serialso" id="serialso">
    </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Hostname</b>
      <input type="text" name="hostname" id="hostname">
    </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Endereço MAC</b>
      <input type="text" name="mac" id="mac">
    </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">IP</b>
      <input type="text" name="ip" id="ip">
    </label>
  </div>

  <label class="ls-label col-md-12 ">
	<b class="ls-label-text">Observação</b>
	<textarea name="observacao" id="observacao" rows="3"></textarea>
  </label>

  <div class="ls-float-right">
	<input type="submit" class="ls-btn-primary" value="Salvar">
  </div>
</fieldset>

{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		$('#oculto').hide();
  		setTitulo('Adicionando novo equipamento');

		$('#ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    		translation: {
	      		'Z': {
	        		pattern: /[0-9]/, optional: true
      			}
    		}
  		});
	
	});

	$('select[name=id_modelo]').change(function () {
		var id_modelo = $('#id_modelo').val();
		 $.get('/modelos/quantocusta/' + id_modelo, function (response) {
	        $.each(response, function (key, value) {
	        	$('#valor').val(value.valor);
      		});
	    });

		var selected = $("#id_modelo option:selected").text().toLowerCase();
		var str1 = "desktop";
		var str2 = "notebook";
		
		if ((selected.indexOf(str1) >= 0) || (selected.indexOf(str2) >= 0)) {
	    	$("#oculto").show();
		} else {
			$("#oculto").hide();
		}
	});
</script>
@stop