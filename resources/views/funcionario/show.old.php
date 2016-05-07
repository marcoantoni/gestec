@extends('layouts.master')

@section('content')
<div class="ls-list printable">
  <header class="ls-list-header">
    <div class="ls-list-title col-md-9">
      <h1 class="ls-ico-users">Relatório do funcionário {{ $funcionario[0]->nome }}</h1>
    </div>
    <div class="col-md-3 ls-txt-right">

    </div>
  </header>
  <div class="ls-list-content">
    <div class="col-xs-12 col-md-8">
      <span class="ls-list-label">Nome</span>
      <strong>{{ $funcionario[0]->nome }}</strong>
    </div>
  
    <div class="col-xs-12 col-md-4">
      <span class="ls-list-label">Onde trabalha</span>
      <strong>{{ $funcionario[0]->lotacao }}</strong>
    </div>
  </div>
  <div class="ls-list-content">
    <div class="col-xs-12 col-md-6">
      <span class="ls-list-label">Cargo</span>
      <strong>{{ $funcionario[0]->cargo }}</strong>
    </div>
    <div class="col-xs-12 col-md-2">
      <span class="ls-list-label">Matrícula</span>
      <strong>{{ $funcionario[0]->matricula }}</strong>
    </div>
  </div>

  <div class="ls-list-content">
    <div class="col-xs-12 col-md-3">
      <span class="ls-list-label">RG</span>
      <strong>{{ $funcionario[0]->rg }}</strong>
    </div>
    
    <div class="col-xs-12 col-md-3">
      <span class="ls-list-label">CPF</span>
      <strong>{{ $funcionario[0]->cpf }}</strong>
    </div>

    <div class="col-xs-12 col-md-3">
      <span class="ls-list-label">Telefone</span>
      <strong>{{ $funcionario[0]->telefone }}</strong>
    </div>
    <div class="col-xs-12 col-md-3">
      <span class="ls-list-label">Email</span>
      <strong>{{ $funcionario[0]->email }}</strong>
    </div>
  </div>
</div>
@stop