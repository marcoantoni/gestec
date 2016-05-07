$("#manautencaopreventiva").hide();
$("#ocomon").hide();

$('select[name=id_responsavel]').change(function () {
	var id_responsavel = $(this).val();
        $.get('/problema/getproblemas/' + id_responsavel, function (problemas) {
        $('select[name=id_problema]').empty();
        $.each(problemas, function (key, value) {
           $('select[name=id_problema]').append('<option value=' + value.id + '>' + value.descricao + '</option>');               
        });
    });
});


$('select[name=id_problema]').change(function () {
  var selected = $("#id_problema option:selected").text().toLowerCase();
  var str = "preventiva";

  if (selected.indexOf(str) > 0){
    $("#manautencaopreventiva").show();
    $("#ocomon").show();
  }

});



$('#id_manutencao_preventiva').blur(function() {
    var ano = $('#id_manutencao_preventiva').val();
      $.get('/manutencao/detalhes/' + ano, function (response) {
        $('#problema').val(response.detalhes);
    });

});

$('#patrimonio').blur(function() {
	var patrimonio = $(this).val();
  	$.get('/equipamentos/comquemesta/' + patrimonio, function (patrimonio) {
    	$('#nome').empty();
        $('#email').empty();
        $('#telefone').empty();
        $.each(patrimonio, function (key, value) {
      		$('#funcionario').val(value.nome);
      		$('#email').val(value.email);
     	 	$('#telefone').val(value.telefone);
     	 	$('#id_equipamento').val(value.id_equipamento);
        	$('#matricula').val(value.matricula);
     	 	$('#id_devedor').val(value.id_devedor);
      	}); 
	});
});

$('#matricula').blur(function() {
    var matricula = $('#matricula').val();
      $.get('/funcionarios/pesquisarinfo/' + matricula, function (response) {
        $('#funcionario').val(response.nome);
        $('#email').val(response.email);
        $('#telefone').val(response.telefone);
        $('#id_devedor').val(response.id);

        var element = document.getElementById('id_lotacao');
    	element.value = response.id_lotacao;

    });

});

$('select[name=limite]').change(function () {
	consultar();
});

function consultar(){
	$("#consulta").empty();
	var responsavel = $("#id_responsavel").val();	
	var filtro = $("#filtro").val();
	var limite = $("#limite").val();
	var base_url = window.location.origin + '/chamados';

	if (filtro == 1){
		setTitulo("Chamados não atendidos");
		$('#consulta').append('<table class="ls-table ls-xs-space table-hover ls-bg-header" id="registros"><tr><thead><th>Nº</th><th>Atendido por</th><th>Usuário</th><th>Descrição problema</th><th>Área problema</th><th>Aberto</th><th>Observação</th><th>Atender</th></tr></thead><tbody></tbody></table>');
		
		$.get(base_url + '/pesquisar/' + responsavel +'/'+filtro+'/'+limite, function (chamados) {
	        $.each(chamados, function (key, value) {
	        	var observacao = value.observacao ? value.observacao : '';
	        	 $('#registros').append('<tr>'+
	        	 	'<td><a href="'+base_url+'/'+value.id+'">'+value.id+'</a></td>'+
	        	 	'<td>'+value.tecnico+'</td>'+
	        	 	'<td>'+value.usuario+'</td>'+
	        	 	'<td>'+value.problema+'</td>'+
	        	 	'<td>'+value.descricao+'</td>'+
	        	 	'<td>'+value.aberto+'</td>'+
	        	 	'<td>'+observacao+'</td>'+
	        	 	'<td>'+
	        	 		'<a href="' + base_url +'/atender/'+ value.id +'"<span class="glyphicon glyphicon-wrench">Atender</span>'+  	 	
	        	 	'</tr>');
	        }); 
		});
	} else if (filtro == 2){
		setTitulo("Chamados em atendimento");
		$('#consulta').append('<table class="ls-table ls-xs-space table-hover ls-bg-header" id="registros"><thead><tr><th>Nº</th><th>Atendido por</th><th>Usuário</th><th>Descrição problema</th><th>Área problema</th><th>Aberto</th><th>Observação</th><th>Encerrar</th></tr></thead><tbody></tbody></table>');
		
		$.get(base_url + '/pesquisar/' + responsavel +'/'+filtro+'/'+limite, function (chamados) {
	        $.each(chamados, function (key, value) {
	        	var observacao = value.observacao ? value.observacao : '';
	        	 $('#registros').append('<tr>'+
	        	 	'<td><a href="'+base_url+'/'+value.id+'">'+value.id+'</a></td>'+
	        	 	'<td>'+value.tecnico+'</td>'+
	        	 	'<td>'+value.usuario+'</td>'+
	        	 	'<td>'+value.problema+'</td>'+
	        	 	'<td>'+value.descricao+'</td>'+
	        	 	'<td>'+value.aberto+'</td>'+
	        	 	'<td>'+observacao+'</td>'+
	        	 	'<td><a href="' + base_url +'/'+ value.id +'/edit"><span class="glyphicon glyphicon-ok-circle"></span>Encerrar</a></td>'+
	        	 '</tr>');
	        }); 
		});

	} else if (filtro == 3) {
		setTitulo("Chamados encerrados");
		$('#consulta').append('<table class="ls-table ls-xs-space table-hover ls-bg-header" id="registros"><thead><tr><th>Nº</th><th>Atendido por</th><th>Usuário</th><th>Descrição problema</th><th>Área problema</th><th>Aberto</th><th>Encerrado</th></tr></thead><tbody></tbody></table>');
		
		$.get(base_url + '/pesquisar/' + responsavel +'/'+filtro+'/'+limite, function (chamados) {
	        $.each(chamados, function (key, value) {
	        	var observacao = value.observacao ? value.observacao : '';
	        	$('#registros').append('<tr>'+
	        	 	'<td><a href="'+base_url+'/'+value.id+'">'+value.id+'</a></td>'+
	        	 	'<td>'+value.tecnico+'</td>'+
	        	 	'<td>'+value.usuario+'</td>'+
	        	 	'<td>'+value.problema+'</td>'+
	        	 	'<td>'+value.descricao+'</td>'+
	        	 	'<td>'+value.aberto+'</td>'+
	        	 	'<td>'+value.encerrado+'</td>'+
	        	 +'</tr>');
	        }); 
		});
		
	}
}
