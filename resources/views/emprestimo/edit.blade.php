@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-shaft-up-right" id="titulo"></h1>

<div class="col-md-6" id="dados">
	{!! Form::model($emprestimo, [
	    'method' => 'PATCH',
	    'route' => ['emprestimos.update', $emprestimo->id], 
	    'class' => 'ls-form ls-form-horizontal row',
	    'id' => 'emprestimo',
	]) !!}
	<fieldset>
	    <label class="ls-label col-md-8">
	        <b class="ls-label-text">Para quem</b>
	        <div class="ls-custom-select ls-prefix-group">
	            <select name="id_devedor" id="id_devedor" required>
	                @foreach($funcionarios as $funcionario)
	                	@if ($emprestimo->id_devedor == $funcionario->id)
	                    <option value="{{ $funcionario->id }}" id="op{{ $funcionario->id }}" selected>{{ $funcionario->nome }}</option>
	                @endif
	                @endforeach
	            </select>
	        </div>  
	    </label>	

	    <label class="ls-label col-md-4" id="equipamentos">
	        <b class="ls-label-text">Patrimônio</b>
	        <div class="ls-custom-select">
	            <select id="select_id_equipamento"  required>
	            	<option value="0">Selecione</option>
	                @foreach($equipamentos as $equipamento)
	                    <option value="{{ $equipamento->id }}">{{ $equipamento->patrimonio }}</option>
	                @endforeach
	            </select>
	        </div>
	    </label>
		
	    <label class="ls-label col-md-12">
	        <b class="ls-label-text">Observações</b>
	        <textarea id="observacaoentrega" name="observacaoentrega" class="form-control" rows="5"></textarea>
	    </label>
			    
	    <div class="ls-float-right">
	        <a href="{{ route('emprestimos.create')}}" class="ls-btn">Recarregar</a>
	        <a href="#" class="ls-btn" onclick="adicionar()">Confirmar equipamento</a>
	        <input type="submit" class="ls-btn-primary" value="Realizar empréstimo">
	    </div>
	</fieldset>

	{!! Form::close() !!}
</div>
<div class="col-md-6" id="boxSelecionados">
	<h2>Equipamentos selecionados</h2>
	<table class="ls-table table-hover ls-bg-header" id="selecionados">
		<thead>
			<tr>
				<td>Patrimômio</td>
				<td>Descrição</td>
				<td>Excluír</td>
			</tr>
		</thead>
	</table>
</div>

<script>
	$('select[name=id_devedor]').change(function () {
		var resposavel = $('#id_devedor option:selected').text();// $(this).val();           
	   	setTitulo('Novo empréstimo para ' + resposavel);
	});

	function adicionar(){
		// pega o código e o nome da opção selecionada
		var selecionado = $('#select_id_equipamento option:selected').text();
		var idEquipamentoSelecionado = $('#select_id_equipamento').val();

		// remove o equipamento selecionado do select
		$('#select_id_equipamento option[value="'+idEquipamentoSelecionado+'"]').remove();

		// adiciona a opção selecionada na tabela de visualizaçãp
		$('#selecionados').append('<tr id="selecionadoTabela'+idEquipamentoSelecionado+'"><td>' + idEquipamentoSelecionado+'</td><td>'+selecionado+'</td><td><a href="#" class="ls-ico-remove" onclick="remover('+idEquipamentoSelecionado+')"></td></tr>');

		// adicionaa opção selecionada ao campo oculto
		$('#emprestimo').append('<input type="hidden" name="id_equipamento[]" id="id_equipamento'+idEquipamentoSelecionado+'" value="'+ idEquipamentoSelecionado +'">"');

		$('#boxSelecionados').show();
		
	}

	function remover(id){
		$('#id_equipamento'+id).remove();
		$('#selecionadoTabela'+id).hide();
	}


    $( document ).ready(function() {
    	setTitulo('Novo empréstimo');
    	$('#boxSelecionados').hide();

    });
</script>
@stop