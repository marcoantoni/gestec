@extends('layouts.master')

@section('content')

<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>
<div class="ls-float-left">
  <a href="{{ route('equipamentos.create') }}" class="ls-btn-primary">Adicionar novo</a>
  <a href="#" class="ls-btn-primary" data-ls-module="modal" data-target="#modalpesquisar">Pesquisar</a>
</div>

<div class="ls-float-right">
  <label class="ls-label" role="search">
    <b class="ls-label-text ls-hidden-accessible">Filtrar</b>
    <input type="text" id="q" name="q" aria-label="Filtre os dados de exibição" placeholder="Filtre os dados de exibição" class="ls-field-sm" alt="ls-table">
  </label>
</div>

<table class="ls-table table-hover ls-bg-header printable">
  <thead>
    <tr>
	  <th>Patrimônio</th>
   	  <th>Modelo</th>
	  <th>Marca</th>
	  <th>Serial</th>
	  <th>Observação</th>
	  <th>Mais</th>
    </tr>
  </thead>
  @foreach($equipamentos as $equipamento)
    <tr>
	  <td><a href="{{ route('equipamentos.show', $equipamento->id) }}" class="glyphicon glyphicon-info-sign" title="Consultar informações deste equipamento" id="informacoe">{{ $equipamento->patrimonio }}</a></td>
	  <td>{{ $equipamento->modelo }}</td>
	  <td>{{ $equipamento->marca }}</td>
	  <td>{{ $equipamento->serial_hw }}</td>
	  <td>{{ $equipamento->observacao }}</td>
	  <td>
	    <div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
	  	  <a href="#" class="ls-btn ls-btn-sm"></a>
		    <ul class="ls-dropdown-nav">
			  <li>
			    <a href="{{ route('equipamentos.edit', $equipamento->id) }}" class="glyphicon glyphicon-pencil" title="Editar">Editar</a>
			  </li>
			  <li>
			    <a href="#" title="Histórico de empréstimos" id="consulta_historico" onClick="rastrearHistoricoEquip({{ $equipamento->id }})" data-ls-module="modal" data-target="#modalhistorico" style="color: green;">Histórico de empréstimos</a>
			  </li>
			  <li>
			    {!! Form::open(['method' => 'DELETE', 'route' => ['equipamentos.destroy', $equipamento->id], 'id' => 'delete-form']) !!}
				  <a href="#" onclick="document.getElementById('delete-form').submit()" class="glyphicon glyphicon-trash" style="color: red;" title="Lembre-se: Não é possível excluír um registro depois que já tiver outros associados a este">Excluír</a>
			    {!! Form::close() !!}
		      </li>
			</ul>
		</div>
	  </td>
  @endforeach
</table>

<div class="ls-pagination-filter">
  <div class="ls-filter-view">
    <label for="">
      Exibir
      <div class="ls-custom-select ls-field-sm">
        <select name="limite" id="limite" class="ls-label-disable">
            <option value="1">Todos</option>
        </select>
      </div>
    </label>
  </div>
</div>
<!-- modal pesquisar -->
<div class="ls-modal" id="modalpesquisar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
   	  <button data-dismiss="modal">&times;</button>
	  <h4 class="ls-modal-title">Pesquisar</h4>
	</div>
    <div class="ls-modal-body">
	  <form id="pesquisa" action="#"  class="ls-form ls-form-horizontal row">
	  	<fieldset>
		  <label class="ls-label col-md-5">
			<b class="ls-label-text">Situação</b>
		 	  <div class="ls-custom-select">
				<select class="ls-select" id="id_situacao" name="id_situacao">
				  @foreach ($situacao as $s)
			  		<option value="{{ $s->id }}">{{ $s->situacao }}</option>
				  @endforeach
				</select>
			  </div>
		  </label>
			
		  <label class="ls-label col-md-2">
			<b class="ls-label-text">Limite</b>
			  <input type="number" name="limite" id="limite" value="20">
		  </label>
		</fieldset>
	  </form>
    </div>
    <div class="ls-modal-footer">
      <div id="ls-float-right">
	   	<button class="ls-btn" data-dismiss="modal">Fechar</button>
	   	<button class="ls-btn ls-btn-primary" data-dismiss="modal" onClick="consultar()">Pesquisar</button>
	  </div>
    </div>
  </div>
</div><!-- modal pesquisar -->

<!-- modal pesquisar -->
<div class="ls-modal" id="modalhistorico">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
	  <h4 class="ls-modal-title">Histórico de empréstimos</h4>
	</div>
    <div class="ls-modal-body">
      <!-- conteudo gravado pelo jQuery -->
	  <table class="ls-table ls-xs-space table-hover" id="historicoEmprestimoEquipamento"></table>
    </div>
    <div class="ls-modal-footer">
      <div id="ls-float-right">
	    <button class="ls-btn" data-dismiss="modal">Fechar</button>
	  </div>
    </div>
  </div>
</div><!-- modal pesquisar -->

<script>
	$( document ).ready(function() {
  		setTitulo('Todos equipamentos disponíveis');
	});
</script>
 <script src="{{ URL::to('/') }}/js/filtro.js"></script>

@stop