@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-shaft-up-right" id="titulo"></h1>

<div class="ls-float-left">
<a href="{{ route('emprestimos.create') }}" class="ls-btn-primary">Novo empréstimo</a>
<a href="#" class="ls-btn-primary" data-ls-module="modal" data-target="#modalpesquisar">Pesquisar</a>
</div>

<div class="ls-float-right">
  <label class="ls-label" role="search">
    <b class="ls-label-text ls-hidden-accessible">Filtrar</b>
    <input type="text" id="q" name="q" aria-label="Filtre os dados de exibição" placeholder="Filtre os dados de exibição" class="ls-field-sm" alt="ls-table">
  </label>
</div>
<div id="consulta" class="printable"></div>

<div class="ls-pagination-filter">
  <div class="ls-filter-view">
    <label for="">
      Exibir
      <div class="ls-custom-select ls-field-sm">
        <select name="limite" id="limite">
          <option value="10" selected>10</option>
          <option value="30">30</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="1000">1000</option>
        </select>
      </div>
      ítens por página
    </label>
  </div>
</div>

<!-- modal pesquisar -->
<div class="ls-modal" id="modalpesquisar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Pesquisar empréstimos</h4>
    </div>
    <div class="ls-modal-body">
    	<form action="#" class="ls-form ls-form-inline">
			<fieldset>
			    <label class="ls-label col-md-6">
					<b class="ls-label-text">Empréstimos</b>
					<div class="ls-custom-select">
						<select class="ls-select" name="filtro" id="filtro"> 
							<option value="1">Não devolvidos</option>
							<option value="2">Devolvidos</option>
						</select>
					</div>
				</label>

			  	<!--<label class="ls-label col-md-6">
					<b class="ls-label-text">Limite</b>
					<input type="number" name="limite" id="limite" value="20">
				</label>-->
			</fieldset>
		</form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <button type="submit" class="ls-btn-primary" data-dismiss="modal" onClick="consultar()">Pesquisar</button>
    </div>
  </div>
</div><!-- modal pesquisar -->


<!-- modal devolucao -->
<div class="ls-modal" id="modaldevolucao">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal" onclick="fechar()">&times;</button>
      <h4 class="ls-modal-title">Devolução de equipamento</h4>
    </div>
    <div class="ls-modal-body">
    	<form action="#" class="ls-form ls-form-horizontal row">
    		<fieldset>
			   <label class="ls-label col-md-6">
				<b class="ls-label-text">Equipamento</b>
					<input type="text" id="equipamento" name="equipamento" required disabled>
				</label>
				<label class="ls-label col-md-6">
					<b class="ls-label-text">Empréstimo nº</b>
					<input type="text" id="id_emprestimo" name="id_emprestimo" required disabled>
				</label>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Observação</b>
					<textarea id="solucao" name="observacaodevolucao" rows="3" contenteditable="true"></textarea>
				</label>
			<fieldset>
		</form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal" onclick="fechar()">Fechar</button>
      <button type="submit" class="ls-btn-primary" data-dismiss="modal" onClick="devolverEquipamento()">Devolver</button>
    </div>
  </div>
</div><!--modal devolucao -->

<!-- modalHistoricoEmprestimos -->
<div class="ls-modal" id="modalHistoricoEmprestimos">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal" onclick="limparHistorico()">&times;</button>
      <h4 class="ls-modal-title">Histórico de empréstimos do equipamento</h4>
    </div>
    <div class="ls-modal-body">
      	<!-- conteudo gravado pelo jQuery -->
    	<table id="historicoEmprestimoEquipamento"></table>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal" onclick="limparHistorico()">Fechar</button>
      <br>
    </div>
  </div>
</div>
<!-- modalHistoricoEmprestimos -->

<script src="http://tablesorter.com/__jquery.tablesorter.min.js"></script>
<script>
	function fechar(){
		$('#modaldevolucao').hide();
	}

	$(document).ready(function() {
  		consultar();
	});

	$('select[name=limite]').change(function () {
		consultar();
	});

	function consultar(){
		$("#consulta").empty();
		var filtro = $("#filtro").val();
		var limite = $("#limite").val();

		if (filtro == 1){
			setTitulo('Não devolvidos');
			$('#consulta').append('<table class="ls-table table-hover ls-bg-header" id="registros"><thead><tr><th>Nº</th><th>Patrimônio</th><th>Modelo</th><th>Marca</th><th>Está com</th><th>Entregue</th><th>Devolver</th></tr></thead></table>');
			
			$.get('/emprestimos/pesquisar/'+filtro+'/'+limite, function (emprestimos) {
		        $.each(emprestimos, function (key, value) {
		        	 $('#registros').append('<tr id="emprestimo' + value.id_emprestimo + '">'+
		        	 	'<td><a href="emprestimos/'+value.id_emprestimo+'">'+ value.id_emprestimo +'</a></td>'+
		        	 	'<td>'+value.patrimonio +'</td>'+
		        	 	
		        	 	'<td>'+value.modelo+'</td>'+
		        	 	'<td>'+value.marca+'</td>'+
		        	 	'<td>'+value.nome+'</td>'+
		        	 	'<td>'+value.entregue+'</td>'+
		        	 	'<td><a href="#" data-ls-module="modal" data-target="#modaldevolucao" onclick="setInfDev(' + value.id_emprestimo + ',' + value.id_equipamento + ')" title="Devolver" class="ls-ico-shaft-down-left"></a><a href="#" onclick="rastrearHistoricoEquip('+value.id_equipamento+')" data-ls-module="modal" data-target="#modalHistoricoEmprestimos" title="Histórico de empréstimos" class="ls-ico-document"></a></td>'+
		        	 '</tr>');
		        }); 
			});
			setTitulo('Equipamentos não devolvidos');
		} else if (filtro == 2){
			setTitulo('Devolvidos');
			$('#consulta').append('<table class="ls-table table-hover ls-bg-header" id="registros"><thead><tr><th>Nº</th><th>Patrimônio</th><th>Modelo</th><th>Marca</th><th>Esteve com</th><th>Entregue</th><th>Devolvido</th></tr></thead></table>');
			
			$.get('/emprestimos/pesquisar/'+filtro+'/'+limite, function (emprestimos) {
		        $.each(emprestimos, function (key, value) {
		        	 $('#registros').append('<tr>'+
		        	 	'<td><a href="emprestimos/'+value.id_emprestimo+'">'+ value.id_emprestimo +'</a></td>'+
		        	 	'<td>'+value.patrimonio +'</td>'+		        	 	
		        	 	'<td>'+value.modelo+'</td>'+
		        	 	'<td>'+value.marca+'</td>'+
		        	 	'<td>'+value.nome+'</td>'+
		        	 	'<td>'+value.entregue+'</td>'+
		        	 	'<td>'+value.devolucao+'</td>'+
		        	 '</tr>');
		        }); 
			});
			setTitulo('Equipamentos devolvidos');
		}

	}
</script>
 <script src="{{ URL::to('/') }}/js/filtro.js"></script>

@stop