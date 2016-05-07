@extends('layouts.master')

@section('content')
<h1 class="ls-title-intro ls-ico-users" id="titulo"></h1>

<div class="ls-float-left">
  <a href="{{ route('funcionarios.create') }}" class="ls-btn-primary">Cadastrar novo</a>
  <a href="funcionarios/ver/todos/" class="ls-tooltip-top ls-btn-primary" aria-label="Utilize está opção para: ver todos os funcionários e mais ações">Relatório completo</a>
</div>
<div class="ls-float-right">
	<label class="ls-label col-md-12">
      <div class="ls-prefix-group">
        <input type="search" id="q" name="q" aria-label="Filtre os dados de exibição" placeholder="Nome" class="ls-field-sm" autofocus>
          <a class="ls-label-text-prefix ls-ico-search" href="#">
          </a>
      </div>
    </label>

</div>

<table class="ls-table table-hover ls-bg-header" id="resultado">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

</div>
<!--<script src="{{ URL::to('/') }}/js/filtro.js"></script>-->
<script>
	$( document ).ready(function() {
		$('#resultado').hide();
  		setTitulo('Pesquisa rápida de funcionários');
	});

	$("#q").keyup(function(){
    	var q = $("#q").val();
    	if (q.length > 2){
	    	$('#resultado').show();
	    	var url = '/funcionarios/nome/' + q;
	    	$("td").remove();
	    	var base_url = window.location.origin + '/funcionarios/'
	    	$.get(url, function (response) {
	    		$.each(response, function (key, value) {
		    		//alert(value.matricula + ' ' + value.nome);
		    		$("#resultado").append('<tr>'+
		    			'<td><a href="'+ base_url+value.id +'">'+ value.nome +'</a></td>'+
		    			'<td>'+ value.email +'</td>'+
		    			'<td>'+ value.telefone +'</td>'+
		    			'</tr>');
			    });
		    });
	    } else {
	    	$('#resultado').hide();
	    }
    }); 
</script>
@stop