@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-users" id="titulo"></h1>
<div class="ls-float-left">
  <a href="{{ route('funcionarios.create') }}" class="ls-btn-primary">Cadastrar novo</a>
  <a href="{{ route('funcionarios.index') }}" class="ls-btn-primary">Pesquisa simples</a>
</div>
<div class="ls-float-right">
  <label class="ls-label" role="search">
    <b class="ls-label-text ls-hidden-accessible">Filtrar</b>
    <input type="text" id="q" name="q" aria-label="Filtre os dados de exibição" placeholder="Filtre os dados de exibição" class="ls-field-sm" alt="ls-table">
  </label>
</div>

<table class="ls-table table-hover ls-bg-header tablesorter" id="myTable" >
  <thead>
    <tr>
      <th>Nome</th>
      <th>Cargo</th>
      <th>Lotação</th>
      <th>Mais</th>
    </tr>
  </thead>
  <tbody>
		@foreach($funcionarios as $funcionario)
		<tr>
			<td>
				<a href="{{ route('funcionarios.show', $funcionario->id) }}" title="Consultar informações do usuário">{{ $funcionario->nome }}</a>
			</td>
			<td>{{ $funcionario->cargo }}</td>
			<td>{{ $funcionario->lotacao }}</td>

			<!-- <td class="ls-txt-center">
			100.000
			<small class="ls-display-block">até 01/01/2014</small>
			</td>-->

			<td>
				<div data-ls-module="dropdown" class="ls-dropdown ls-pos-right">
					<a href="#" class="ls-btn ls-btn-sm"></a>
					<ul class="ls-dropdown-nav">
          <li><a href="#" onClick="rastrearHistoricoFunc({{ $funcionario->id }})" data-ls-module="modal" data-target="#modalhistorico" style="color: green;">Histórico de empréstimos</a></li>
          <li><a href="{{ route('funcionarios.edit', $funcionario->id) }}">Editar</a></li>
						{!! Form::open(['method' => 'DELETE', 'route' => ['funcionarios.destroy', $funcionario->id], 'id' => 'delete-form']) !!}
		       			<a href="#" onclick="document.getElementById('delete-form').submit()" class="ls-color-danger" title="Lembre-se: Não é possível excluír um registro depois que já tiver outros associados a este">Excluir</a>
	        			{!! Form::close() !!}
					</li>
					</ul>
				</div>
			</td>
		</tr>
		@endforeach
  	</tbody>
</table>

<div class="ls-modal" id="modalhistorico">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal" onClick="limparHistorico()">&times;</button>
      <h4 class="ls-modal-title">Histórico de empréstimos</h4>
    </div>
    <div class="ls-modal-body">
      <!-- conteudo gravado pelo jQuery -->
      <table class="ls-table table-hover" id="historicoEmprestimoFuncionario"></table>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" onClick="limparHistorico()" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div><!-- /.modal -->

<div class="ls-pagination-filter">
  <div class="ls-filter-view">
    <label for="">
      Exibir
      <div class="ls-custom-select ls-field-sm">
        <select name="limite" id="limite">
          <option value="#" selected>Todos</option>
        </select>
      </div>
    </label>
  </div>
</div>

</div>
<script src="{{ URL::to('/') }}/js/filtro.js"></script>
<script src="{{ URL::to('/') }}/js/tablesorter.js"></script>
<script>
    $( document ).ready(function() {
      setTitulo('Todos funcionários');
   
      $("table").tablesorter({ 
          // sort on the first column and third column, order asc 
          sortList: [[0,0],[2,0]] 
      }); 

  });

</script>
@stop