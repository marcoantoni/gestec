@extends('layouts.master')

@section('content')
<div class="ls-list printable">
  <header class="ls-list-header">
    <div class="ls-list-title col-md-9">
      <h1 class="ls-ico-history" id="titulo"></h1>
    </div>
    <div class="col-md-3 ls-txt-right">

    </div>
  </header>
  <div class="ls-list-content">
    <div class="col-xs-12 col-md-2">
      <span class="ls-list-label">Chamado número</span>
      <strong>{{ $chamado[0]->id }}</strong>
    </div>

    <div class="col-xs-12 col-md-4">
      <span class="ls-list-label">Usuário</span>
      <strong>{{ $chamado[0]->usuario }}</strong>
    </div>

    <div class="col-xs-12 col-md-4">
      <span class="ls-list-label">Responsável pelo atendimento</span>
      <strong>{{ $chamado[0]->tecnico }}</strong>
    </div>
    <div class="col-xs-12 col-md-2">
      <span class="ls-list-label">Chamado aberto em</span>
      <strong>{{ $chamado[0]->aberto }}</strong>
    </div>
  </div>

  @if ($chamado[0]->id_equipamento != NULL)
  <div class="ls-list-content">
    <div class="col-xs-12 col-md-2">
	  <span class="ls-list-label">Patrimônio</span>
	  <strong>{{ $chamado[0]->patrimonio }}</strong>
    </div>
    <div class="col-xs-12 col-md-5">
      <span class="ls-list-label">Descrição do equipamento</span>
      <strong>{{ $chamado[0]->modelo }} da marca {{ $chamado[0]->marca }}</strong>
    </div>
  </div>
  @endif

  <div class="ls-list-content">
    <div class="col-xs-12 col-md-3">
      <span class="ls-list-label">Categoria</span>
      <strong>{{ $chamado[0]->descricao }}</strong>
    </div>
    <div class="col-xs-12 col-md-9">
      <span class="ls-list-label">Descrição do problema</span>
      <strong>{{ $chamado[0]->problema }}</strong>
    </div>
  </div>

  @if ($chamado[0]->observacaoentrega != NULL)
    <div class="ls-list-content">
      <div class="col-xs-12 col-md-3">
        <span class="ls-list-label">Observação</span>
        <strong>{{ $chamado[0]->observacaoentrega }}</strong>
      </div>
    </div>
  @endif

  @if ($chamado[0]->inicio_atendimento != NULL)
    <div class="ls-list-content">
      <div class="col-xs-12 col-md-3">
        <span class="ls-list-label">Inicio do atendimento</span>
        <strong>{{ $chamado[0]->inicio_atendimento }}</strong>
      </div>
      <div class="col-xs-12 col-md-3">
        <span class="ls-list-label">Fim do atendimento</span>
        <strong>{{ $chamado[0]->fim_atendimento }}</strong>
      </div>
      <div class="col-xs-12 col-md-3">
        <span class="ls-list-label">Tempo do atendimento</span>
        <strong>{{ $chamado[0]->tempo }} minutos</strong>
      </div>
    </div>
  @endif

  @if ($chamado[0]->solucao != NULL)
    <div class="ls-list-content">
      <div class="col-xs-12 col-md-12">
        <span class="ls-list-label">Solução</span>
        <strong>{{ $chamado[0]->solucao }}</strong>
      </div>
    </div>
  @endif
  <div class="ls-list-content" style="padding-top: 100px;">
	  <div style="margin-left: auto; margin-right: auto; width: 620px;">
	    <strong>
        <div style="float: left; width: 300px;">
		      <hr>
		      <p style="text-align: center;">{{ $chamado[0]->tecnico }}</p>
	      </div>
	      <div style="float: right; width: 300px;">
		      <hr>
		      <p style="text-align: center;">{{ $chamado[0]->usuario }}</p>
	      </div>
      </strong>
    </div>
  </div>
</div>

<script>
	$( document ).ready(function() {
  		setTitulo('Detalhes do chamado número {{ $chamado[0]->id }}');
	});
</script>
@stop