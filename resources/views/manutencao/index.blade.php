@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-history" id="titulo"></h1>

<a href="{{ route('manutencao.create') }}" class="ls-btn-primary">Iniciar manunteção preventiva</a>
<a href="#" class="ls-btn-primary" data-ls-module="modal" data-target="#modalpesquisar">Pesquisar</a>
<div class="ls-float-right">
  <label class="ls-label" role="search">
    <b class="ls-label-text ls-hidden-accessible">Filtrar</b>
    <input type="text" id="q" name="q" aria-label="Filtre os dados de exibição" placeholder="Filtre os dados de exibição" class="ls-field-sm" alt="ls-table">
  </label>
</div>
<!-- modal pesquisar -->
<div class="ls-modal" id="modalpesquisar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Pesquisar relatório da manutenção preventiva</h4>
    </div>
    <div class="ls-modal-body">
        <form action="#" class="ls-form ls-form-inline">
            <label class="ls-label col-md-8">
            <b class="ls-label-text">Lotação</b>
                <div class="ls-custom-select">
                    <select class="ls-select" name="id_lotacao" id="id_lotacao"> 
                        <option value="0">Todos</option>
                        @foreach($lotacao as $l)
                            <option value="{{ $l->id }}">{{ $l->lotacao }}</option>
                        @endforeach
                    </select>
                </div>
            </label>

                <label class="ls-label col-md-4">
                <b class="ls-label-text">Filtro</b>
                <div class="ls-custom-select">
                    <select class="ls-select" name="filtro" id="filtro"> 
                        @foreach ($manutencao as $m)
                            <option value="{{ $m->id }}">{{ $m->id }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
        </form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <button type="submit" class="ls-btn-primary" data-dismiss="modal" onClick="consultar()">Pesquisar</button>
    </div>
  </div>
</div><!-- modal pesquisar -->

<div id="resultado" class="printable"></div>
<script src="{{ URL::to('/') }}/js/filtro.js"></script>
<script>
    $( document ).ready(function() {
        setTitulo('Manutenção preventiva');
        consultar();
    });

    function consultar(){
        var ano = $('#filtro').val();
        var id_lotacao = $('#id_lotacao').val();
        var lotacao = $('#id_lotacao option:selected').text();
        setTitulo('Manutenção preventiva de ' + ano + ' ('+ lotacao +')');
        $('#resultado').empty();
        $('#resultado').append('<table class="ls-table table-hover ls-bg-header" id="conteudo"><thead><tr><td>Nome</td><td>Lotação</td><td>Patrimônio</td><td>Fez a manutenção</td></tr></thead></table>');
        var fizeram = 0;
        var naofizeram = 0;
        $.get('/manutencao/andamento/' + ano + '/' + id_lotacao, function (response) {
              $.each(response, function (key, value) {
                var link = value.fim_atendimento ? '<a href="/chamados/'+value.id_chamado+'" class="ls-ico-checkmark"> Chamado nº ('+value.id_chamado+')</a>' : '<a href="#" class="ls-ico-close"></a>';
                $('#conteudo').append('<tr><td>' + value.nome + '</td><td>' + value.lotacao + '</td><td><a href="/equipamentos/' + value.id_equipamento + '"</a>' + value.patrimonio + '</td><td>'+ link +'</td></tr>');
              });
        });
    }
</script>




@stop