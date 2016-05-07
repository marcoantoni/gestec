@extends('layouts.master')

@section('content')

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
      <strong>{{ $emprestimo[0]->observacao }}</strong>
    </div>
  </div>

<div class="ls-list-content ">
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
					{{ $item->tipo }}, marca {{ $item->marca }}, modelo {{ $item->modelo }}.

					@if (!empty($item->devolucao))
						Devolvido em {{ $item->devolucao }}.
					@endif

					@if (!empty($item->observacao))
            {{ $item->observacao }}
          @endif
          @if (!empty($item->caracteristicas))
						Com as caracteristícas: {{ $item->caracteristicas }}
					@endif
				</li>
            @endforeach
        </ul>
      </div>
    </div>
  </header>
</div>
</div>
@stop