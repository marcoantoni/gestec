@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-screen" id="titulo"></h1>
<div class="ls-list">
  <header class="ls-list-header">
    <div class="ls-list-title col-md-9">
      <a href="#">Termo de empréstimo de equipamento</a>
    </div>
    <div class="col-md-3 ls-txt-right">

    </div>
  </header>
  <div class="ls-list-content ">
    <div class="col-xs-12 col-md-5">
      <span class="ls-list-label">Nome</span>
      <strong>{{ $emprestimo[0]->responsavel }}</strong>
    </div>
    <div class="col-xs-12 col-md-5">
      <span class="ls-list-label">Responsável pela entrega</span>
      <strong>{{ $emprestimo[0]->responsavel_entrega }}</strong>
    </div>
    <div class="col-xs-12 col-md-2">
      <span class="ls-list-label">Data</span>
      <strong>{{ $emprestimo[0]->entregue }}</strong>
    </div>
  </div>

  <div class="ls-list-content ">
    <div class="col-xs-12 col-md-12">
      <span class="ls-list-label">Observação</span>
      <strong>{{ $emprestimo[0]->observacaoentrega }}</strong>
    </div>
  </div>
</div>

<div class="ls-list">
  <header class="ls-list-header">
    <div class="col-md-9">
      <div class="ls-list-title ">
        <a href="#">Equipamentos levados</a>
      </div>
      <div class="ls-list-description">
        <p>Descrição de todos os equipamentos emprestados</p>
        <ul>
            @foreach ($detalhe_emprestimo as $item)
				<li>
					{{ $item->tipo }} {{ $item->marca }} {{ $item->modelo }}.

					@if (!empty($item->devolucao))
						Devolvido em {{ $item->devolucao }}.
					@endif

					@if (!empty($item->observacao))
						{{ $item->observacao }}
					@endif
				</li>
            @endforeach
        </ul>
      </div>
    </div>
  </header>
</div>


<div class="printable">
	<table class="ls-table table-striped">
		@if (isset($equipamento[0]->patrimonio))
			<tr>
				<td>Patrimônio</td>
				<td>{{ $equipamento[0]->patrimonio }}</td>
			</tr>
		@endif
		<tr>
			<td>Descrição</td>
			<td>{{ $equipamento[0]->tipo_equipamento }}, marca {{ $equipamento[0]->marca }}, modelo {{  $equipamento[0]->modelo }}</td>
		</tr>
		@if (isset($equipamento[0]->serial_hw) != 0)
			<tr>
				<td>Serial do Hardware</td>
				<td>{{ $equipamento[0]->serial_hw }}</td>
			</tr>
		@endif
		@if (isset($equipamento[0]->sistemaoperacional) != 0)
			<tr>
				<td>Está rodando</td>
				<td>{{ $equipamento[0]->sistemaoperacional }} {{ $equipamento[0]->arquitetura }} </td>
			</tr>
		@endif
		@if (isset($equipamento[0]->serial_so) != NULL)
			<tr>
				<td>Serial do sistema operacional</td>
				<td>{{ $equipamento[0]->serial_so }}</td>
			</tr>
		@endif
		<tr>
			<td>Observações</td>
			<td>
				<p></p>
				<p>{{ $equipamento[0]->observacao }}</p>
			</td>
		</tr>
	</table>
	<hr>
	<div id="historico">
		<h2 style="text-align: center; padding: 5px;">Histórico de empréstimos</h2>
	</div>	
	<div id="historicochamados">
		<h2 style="text-align: center; padding: 5px;">Histórico de manutenções</h2>
		<table class="ls-table table-striped">		
			@foreach ($historiCochamados as $h)
				<tr>
					<td>{{ $h->usuario }} entegou o equipamento para {{ $h->tecnico }} em {{ $h->aberto }}. A decrição do chamado diz: "{{ $h->problema }}". Chamado foi atendido em {{ $h->inicio_atendimento }} e encerrado em {{ $h->fim_atendimento }}.</td>" 
				</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
	$(document).ready(function() {
		setTitulo('Relatório do patrimônio '+{{ $equipamento[0]->patrimonio }});
		rastrearHistoricoEquip({{ $equipamento[0]->id }});
	});
</script>
@stop