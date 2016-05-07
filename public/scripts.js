function limparHistorico(){
  $("#historicoEmprestimoEquipamento").empty();
	$("#historicoEmprestimoFuncionario").empty();
}

function rastrearHistoricoEquip(id){
	$.get('/equipamentos/historico/' + id, function (historico) {
            $.each(historico, function (key, value) {
              if (value.obs_devolucao === undefined)
                 obs = 'Observação na devolução: ' + value.obs_devolucao;
              else 
                obs = ' '; 
               $('#historicoEmprestimoEquipamento').append('<tr><td>'+ value.nome + ' pegou emprestado dia ' + value.entregue + ' e devolveu dia ' + value.devolucao + obs + '</td></tr>');
            });
        });
}

function rastrearHistoricoFunc(id){
	$.get('/funcionarios/historico/' + id, function (historico) {
          $.each(historico, function (key, value) {
             $('#historicoEmprestimoFuncionario').append('<tr><td>'+ 'Modelo: ' + value.modelo + ' Marca: ' + value.marca + ' entregue dia: ' + value.entregue + ' Devolvido: ' + value.devolucao+'</td></tr>');
          });
      });
}

// fazer rastrearHistoricoChamados

function devolverEquipamento(){
    var id_emprestimo = $("#id_emprestimo").val();
    var id_notebook = $("#equipamento").val();
    var observacao = $("#observacaodevolucao").val();

    $.get( "/devolver/"+id_emprestimo+"/"+id_notebook+"/"+observacao, function( data ) {
      $('#emprestimo'+id_emprestimo).hide();
      locastyle.modal.open("#modalSucesso");
      //$("#sucesso").show();
    });
    $('#modaldevolucao').hide();
}

function setInfDev(id_termo, id_notebook){
    $("#equipamento").val(id_notebook);

    $("#id_emprestimo").val(id_termo);

    $("#observacao").val(' ');

    $("#modaldevolucao").show();

}

function formatarCPF(mascara, documento){
        var i = documento.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(i)
        
        if (texto.substring(0,1) != saida)
          documento.value += texto.substring(0,1);
      }