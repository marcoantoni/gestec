@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-history" id="titulo"></h1>
<div class="ls-float-left">
  <a href="{{ route('chamados.create') }}" class="ls-btn-primary">Abrir novo</a>
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
        </select>
      </div>
      ítens por página
    </label>
  </div>
</div>

<!-- modal histórico -->
<div class="ls-modal" id="modalhistorico">
	<div class="ls-modal-box">
	    <div class="ls-modal-header">
	    	<button data-dismiss="modal">&times;</button>
	      	<h4 class="ls-modal-title">Histórico de empréstimos</h4>
	    </div>
	    <div class="ls-modal-body">
	    	<!-- conteudo gravado pelo jQuery -->
	    	<table id="historicoChamadosUsuario" class=""></table>
	    </div>
	    <div class="ls-modal-footer">
	      	<button class="ls-btn ls-float-right" data-dismiss="modal" id="limparHistorico" onClick="limparHistorico()">Fechar</button>
	    </div>
	</div>
</div><!-- modal histórico -->


<div class="ls-modal" id="modalpesquisar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Pesquisa por chamados</h4>
    </div>
    <div class="ls-modal-body">
    	<form id="pesquisa" action="#"  class="ls-form ls-form-horizontal row">
    		<fieldset>
				<label class="ls-label col-md-6">
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

				<label class="ls-label col-md-6">
					<b class="ls-label-text">Chamados</b>
					<div class="ls-custom-select">
						<select class="ls-select" name="filtro" id="filtro" required>
							<option value="1">abertos</option>
							<option value="2">em atendimento</option>
							<option value="3">encerrados</option>
						</select>
					</div>
				</label>
				<!--<label class="ls-label col-md-2">
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
</div><!-- /.modal -->
	
<script src="{{ URL::to('/') }}/chamados.js"></script>
<script src="{{ URL::to('/') }}/js/filtro.js"></script>
<script src="{{ URL::to('/') }}/js/tablesorter.js"></script>
<script>
  $( document ).ready(function() {
      $("table").tablesorter({ 
          // sort on the first column and third column, order asc 
          sortList: [[0,0],[2,0]] 
      }); 
      consultar();
      $("table").tablesorter({ 
          // sort on the first column and third column, order asc 
          sortList: [[0,0],[2,0]] 
      }); 
	});
</script>


@stop