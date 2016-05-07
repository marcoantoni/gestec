@extends('layouts.master')

@section('content')
  <div class="ls-list printable">
    <header class="ls-list-header">
      <div class="ls-list-title col-md-9">
        <h1 class="ls-ico-screen" id="titulo"></h1>
      </div>
      <div class="col-md-3 ls-txt-right">

      </div>
    </header>
    <div class="ls-list-content">
      @if (isset($equipamento[0]->patrimonio))
        <div class="col-xs-12 col-md-2">
          <span class="ls-list-label">Patrimônio</span>
          <strong>{{ $equipamento[0]->patrimonio }}</strong>
        </div>
      @endif
      <div class="col-xs-12 col-md-7">
        <span class="ls-list-label">Descrição</span>
        <strong>{{ $equipamento[0]->tipo_equipamento }}, marca {{ $equipamento[0]->marca }}, modelo {{  $equipamento[0]->modelo }}</strong>
      </div>
      @if (isset($equipamento[0]->serial_hw) != 0)
        <div class="col-xs-12 col-md-3">
          <span class="ls-list-label">Serial do hardware</span>
          <strong>{{ $equipamento[0]->serial_hw }}</strong>
        </div>
      @endif
    </div>

    <div class="ls-list-content">
      @if (isset($equipamento[0]->sistemaoperacional) != 0)
        <div class="col-xs-12 col-md-2">
          <span class="ls-list-label">Está rodando</span>
          <strong>{{ $equipamento[0]->sistemaoperacional }} {{ $equipamento[0]->arquitetura }}</strong>
        </div>
      @endif
      @if (isset($equipamento[0]->serial_so) != NULL)
      <div class="col-xs-12 col-md-7">
        <span class="ls-list-label">Chave do sistema operacional</span>
        <strong>{{ $equipamento[0]->serial_so }}</strong>
      </div>
    @endif
    
    <div class="col-xs-12 col-md-2">
      <span class="ls-list-label">Valor</span>
      <strong>{{ $equipamento[0]->valor }}</strong>
    </div>
  </div>


  <div class="ls-list-content">
    <div class="col-xs-4 col-md-4">
      <span class="ls-list-label">Hostname</span>
      <strong>{{ $equipamento[0]->hostname }}</strong>
    </div>
    <div class="col-xs-4 col-md-4">
      <span class="ls-list-label">IP</span>
      <strong>{{ $equipamento[0]->ip }}</strong>
    </div>
    <div class="col-xs-4 col-md-4">
      <span class="ls-list-label">MAC</span>
      <strong>{{ $equipamento[0]->mac }}</strong>
    </div>
  </div>
  
  <div class="ls-list-content">
    @if (isset($equipamento[0]->sistemaoperacional) != 0)
      <div class="col-xs-12 col-md-12">
        <span class="ls-list-label">Observação</span>
        <strong>{{ $equipamento[0]->observacao }}</strong>
      </div>
    @endif
  </div>

  <div class="ls-list-content">
      <h2 style="text-align: center; padding: 5px;">Histórico de empréstimos</h2>
      <table class="ls-table table-hover ls-bg-header" id="historicoEmprestimoEquipamento"></table>
      <h2 style="text-align: center; padding: 5px;">Histórico de manutenções</h2>
      <table class="ls-table table-hover ls-bg-header">		
        @foreach ($historiCochamados as $h)
	      <tr>
	        <td>{{ $h->usuario }} entegou o equipamento para {{ $h->tecnico }} em {{ $h->aberto }}. A decrição do chamado diz: "{{ $h->problema }}". Chamado foi atendido em {{ $h->inicio_atendimento }} e encerrado em {{ $h->fim_atendimento }}.</td> 
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