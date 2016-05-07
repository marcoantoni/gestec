@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-history" id="titulo"></h1>

{!! Form::open([
    'route' => 'chamados.store',
    'class' => 'ls-form ls-form-horizontal row'
]) !!}
<fieldset>
	<label class="ls-label col-md-4">
		<b class="ls-label-text">Área responsável</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_responsavel" id="id_responsavel" required>
				<option value="0">Selecione</option>
				@foreach($responsavel as $r)
					<option value="{{ $r->id }}">{{ $r->responsavel }}</option>
				@endforeach
			</select>
		</div>
	</label>

	<label class="ls-label col-md-4">
		<b class="ls-label-text">Problema</b>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_problema" id="id_problema" required></select>
		</div>
	</label>
	
	<label class="ls-label col-md-2">
		<b class="ls-label-text">Patrimônio</b>
		<input type="text" name="patrimonio" id="patrimonio">
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Matrícula</b>
		<div class="ls-prefix-group">
		  <input type="text" name="matricula" id="matricula" required>
		  <a class="ls-tooltip-left ls-label-text-prefix ls-toggle-pass" data-ls-module="modal" data-target="#modalpesquisar" href="#" aria-label="Pesquisar a matrícula"><span class="ls-ico-search"></span></a>
		</div>
	</label>

	<div id="manautencaopreventiva">
		<label class="ls-label col-md-6">
			<b class="ls-label-text">Ano manutenção preventiva</b>
			<input type="number" name="id_manutencao_preventiva" id="id_manutencao_preventiva">
		</label>

		<label class="ls-label col-md-6">
			<b class="ls-label-text">Nº ocomon</b>
			<input type="number" name="nocomon" id="nocomon" class="form-control">
		</label>		
	</div>


	<label class="ls-label col-md-4">
		<b class="ls-label-text">Funcionário</b>
          <input type="text" name="funcionario" id="funcionario" class="ls-label-disable">
	</label>

	<label class="ls-label col-md-3">
		<a href="#" class="ls-tooltip-top ls-label-text" aria-label="Por padrão, o local pré selecionado será onde o funcionário está lotado">Local da manutenção</a>
		<div class="ls-custom-select">
			<select class="ls-select" name="id_lotacao" id="id_lotacao">
			@foreach($lotacao as $l)
				<option value="{{ $l->id }}">{{ $l->lotacao }}</option>
			@endforeach
			</select>
		</div>
	</label>

	<label class="ls-label col-md-3">
		<b class="ls-label-text">E-mail</b>
		<input type="email" name="email" id="email">
	</label>

	<label class="ls-label col-md-2">
		<b class="ls-label-text">Telefone</b>
		<input type="text" name="telefone" id="telefone">
	</label>

	<label class="ls-label col-md-12">
		<b class="ls-label-text">Problema</b>
		<textarea id="problema" name="problema" class="form-control" rows="3"></textarea>
	</label>
	
	<label class="ls-label col-md-12">
		<b class="ls-label-text">Observação</b>
		<textarea id="observacaoentrega" name="observacaoentrega" class="form-control" rows="3" contenteditable="true"></textarea>
	</label>

	<input type="hidden" id="id_equipamento" name="id_equipamento">
	<input type="hidden" id="id_devedor" name="id_devedor">
	
	<div class="ls-float-left">
		<a href="#" class="ls-tooltip-top ls-btn-danger" onclick="abrirColetivo()" aria-label="ATENÇÃO: Um chamado coletivo é aberto para todos usuários que tem algum equipamento emprestado">Abrir chamado coletivo</a>
	</div>
	<div class="ls-float-right">
		<input type="submit" class="ls-btn-primary" value="Salvar">
	</div>
</fieldset>

<!-- modal pesquisar -->
<div class="ls-modal" id="modalpesquisar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Pesquisar matrícula</h4>
    </div>
    <div class="ls-modal-body">
    	<form action="#" class="ls-form ls-form-inline">
			<fieldset>
			  	<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome</b>
					<input type="text" name="termo" id="termo">
				</label>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Resultado</b>
					<div class="ls-custom-select">
						<select name="resultado" id="resultado"></select>
					</div>
				</label>	
			</fieldset>
		</form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div><!-- modal pesquisar -->

<!-- modal confirmar -->
<div class="ls-modal" id="modalconfirmar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Pesquisar matrícula</h4>
    </div>
    <div class="ls-modal-body">
    	<form action="#" class="ls-form ls-form-inline">
			<fieldset>
			  	<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome</b>
					<input type="text" name="termo" id="termo">
				</label>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Resultado</b>
					<div class="ls-custom-select">
						<select name="resultado" id="resultado"></select>
					</div>
				</label>	
			</fieldset>
		</form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div><!-- modal pesquisar -->

{!! Form::close() !!}

<script>
	$( document ).ready(function() {
  		setTitulo('Abrindo novo chamado');
	});

	
    $("#termo").keyup(function(){
    	var termo = $("#termo").val();
    	//var url = '/funcionarios/nome/' + termo;
    	$('select[name=resultado]').empty();
    	$('select[name=resultado]').append('<option value="">Selecione um nome</option>');
    	$.get('/funcionarios/nome/' + termo, function (response) {
    		$.each(response, function (key, value) {
	    		$('select[name=resultado]').append('<option value=' + value.matricula + '>' + value.nome + '</option>');
		    });
	    });
    }); 

    $('select[name=resultado]').change(function () {
		var matricula = $('#resultado').val();
		//$("#matricula").focus();
		$("#matricula").val(matricula);
		$("#matricula").blur();
	});

    function abrirColetivo(){
		var id_problema = $('#id_problema').val(); 
		var problema = $('#problema').val(); 
	  	var ano =  $('#id_manutencao_preventiva').val();
	  	
	  	if (ano == '')
	  		ano = 0;

	  	var url = window.location.origin + '/chamados/abrircoletivo/'+id_problema+'/'+problema+'/'+ano;
	  	var jqxhr = $.get( url, function() {
		  locastyle.modal.open("#modalSucesso");
		})      
  	}; 

</script>
<script type="text/javascript" src="{{ URL::to('/') }}/chamados.js"></script>
@stop