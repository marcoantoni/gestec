<!DOCTYPE html>
<html lang="pt-BR" class="ls-theme-turquoise">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Gestec, gestão de tecnologia da informação">
    <meta name="author" content="Marco Antoni">
    <link rel="icon" href="../../favicon.ico">
    <style>
      .linkhistorico {color: green;}
      @media print {
            * {
    background:transparent !important;
    color:#000 !important;
    text-shadow:none !important;
    filter:none !important;
    -ms-filter:none !important;
    }
     
    body {
    margin:0;
    padding:0;
    line-height: 1.4em;
    
    margin: 0.5cm;
    display:none; 
    }
    .printable{
      visibility: visible;
      display:block;
      }
    }
    </style>

    <title>GesTec</title>
    <script type="text/javascript" src="{{ URL::to('/') }}/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/lstyle/javascripts/locastyle.js"></script>
  
    <!-- Coloque o CSS no seu HEAD -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/lstyle/stylesheets/locastyle.css">
    <script src="{{ URL::to('/') }}/scripts.js"></script>
    <!-- Coloque o JS no seu FOOTER, logo depois da jQuery -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

    <!-- Links de apoio -->
    <div class="ls-alerts-list">
      <a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain" data-target="#ls-notification-curtain"><span>Notificações</span></a>
      <a href="#" class="ls-ico-bullhorn" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"><span>Ajuda</span></a>
      <a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugestões</span></a>
    </div>

    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <img src="" alt="" />
        <span class="ls-name"></span>
      </a>

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href="#" data-ls-module="modal" data-target="#modalmudartema">Mudar tema</a></li>
          <li><a href="{{ url('sair') }}">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  
  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="home" class="ls-ico-earth">
        <small>Gestão em Tecnologia da Informação</small>
        Gestec
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


    <aside class="ls-sidebar">

  	<div class="ls-sidebar-inner">

      <nav class="ls-menu">
        <ul>
          <li class="dropdown">
              <a href="#" class="ls-ico-history" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chamados <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('chamados.create')}}"><span class="glyphicon glyphicon-plus"></span> Abrir novo</a></li>
                <li><a href="{{ route('chamados.index')}}"><span class="glyphicon glyphicon-th-list"></span> Ver todos</a></li>
                <li><a href="{{ route('manutencao.index')}}"><span class="glyphicon glyphicon-wrench"></span> Manutenção preventiva</a></li>
              </ul>
            </li>
            <!-- empréstimos -->
            <li class="dropdown">
              <a href="#" class="ls-ico-shaft-up-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empréstimos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('emprestimos.create')}}"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
                <li><a href="{{ route('emprestimos.index')}}"><span class="glyphicon glyphicon-th-list"></span> Ver todos</a></li>
                <li><a href="{{ route('manutencao.index')}}"><span class="glyphicon glyphicon-wrench"></span> Manutenção preventiva</a></li>
              </ul>
            </li>
             <!-- equipamentos -->
            <li class="dropdown">
              <a href="#" class="ls-ico-screen" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipamentos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('equipamentos.create')}}"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
                <li><a href="{{ route('equipamentos.index')}}"><span class="glyphicon glyphicon-th-list"></span> Ver todos</a></li>
              </ul>
            </li>
            <!-- funcionarios -->
            <li class="dropdown">
              <a href="#" class="ls-ico-users" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Funcionarios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('funcionarios.create')}}"> Adicionar</a></li>
                <li><a href="{{ route('funcionarios.index')}}"><span class="glyphicon glyphicon-th-list"></span>Pesquisa rápida</a></li>
              </ul>
            </li>
            
            <!-- outros -->
           <li>
             <a href="#" class="ls-ico-list3" title="Outros cadastros/relatórios">Outros</a>
             <ul>
                <li><a href="{{ route('cargos.create') }}"><span class="glyphicon glyphicon-question-sign"></span>Cargos</a></li>
                <li><a href="{{ route('lotacao.create') }}"><span class="glyphicon glyphicon-map-marker"></span> Locais</a></li>
                <li><a href="{{ route('marca.create') }}"><span class="glyphicon glyphicon-registration-mark"></span> Marcas</a></li>
                <li><a href="{{ route('modelos.index') }}"><span class="glyphicon glyphicon-blackboard"></span> Modelos</a></li>
                <li><a href="{{ route('problemas.create') }}"><span class="glyphicon glyphicon-question-sign"></span> Problemas</a></li>
            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>
  <main class="ls-main ">
    <div class="container-fluid">
      <!-- erros -->
      @if (isset($errors))
        <div class="ls-alert-box ls-dismissable ls-alert-box-danger" id="error">
          <header class="ls-info-header">
           <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
          <h2 class="ls-title-3">Erro</h2>
        </header><!-- /header -->
        @foreach ($errors as $error)
         <p>{{ $error }}</p>
        @endforeach
        </div>
        <!-- fim erros -->
      @endif

    <div class="ls-modal" id="modalSucesso">
      <div class="ls-modal-box ls-alert-box-success">
        <div class="ls-modal-header">
          <button data-dismiss="modal">&times;</button>
          <h4 class="ls-modal-title">Sucesso</h4>
        </div>
        <div class="ls-modal-body" id="sucess">
          <p>Ação completada com sucesso!<p>
        </div>
        <div class="ls-modal-footer">
          <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div><!-- /.modal -->
 
  @yield('content')
  
 <footer class="ls-footer" role="contentinfo">
  <div class="ls-footer-info">
    <span class="last-access ls-ico-screen"><strong>Último acesso: </strong>99/99/9999 99:99:99</span>
    <div class="set-ip"><strong>IP:</strong> 000.00.00.000</div>
    <p class="ls-copy-right">Desenvolvido por Marco Antoni</p>
  </div>
</footer>
<!--modal mudar tema -->
<!-- modal pesquisar -->
<div class="ls-modal" id="modalmudartema">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Mudar tema</h4>
    </div>
    <div class="ls-modal-body">
      <form action="#" class="ls-form ls-form-inline">
      <fieldset>
          <label class="ls-label col-md-6">
          <b class="ls-label-text">Tema</b>
          <div class="ls-custom-select">
            <select class="ls-select" name="tema" id="tema"> 
              <option value="ls-theme-dark-yellow">Amarelo Escuro</option>
              <option value="ls-theme-yellow-gold">Amarelo Ouro</option>
              <option value="ls-theme-blue">Azul</option>
              <option value="ls-theme-indigo">Azull Índigo</option>
              <option value="ls-theme-turquoise">Azul Turquesa</option>
              <option value="ls-theme-light-blue">Azul Claro</option>
              <option value="ls-theme-gray">Cinza</option>
              <option value="ls-theme-gold">Dourado</option>
              <option value="ls-theme-orange">Laranja</option>
              <option value="ls-theme-light-brown">Marrom Claro</option>
              <option value="ls-theme-purple">Roxo</option>
              <option value="ls-theme-green">Verde</option>
              <option value="ls-theme-light-green">Verde Claro</option>
              <option value="ls-theme-green-lemon">Verde Limão</option>
              <option value="ls-theme-moss">Verde Musgo</option>
              <option value="ls-theme-light-red">Vermelho Claro</option>
            </select>
          </div>
          <input type="hidden" name="id_funcionario">
        </label>
    {!! Form::close() !!}
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <button type="submit" class="ls-btn-primary" data-dismiss="modal" onClick="salvarTema()">Salvar</button>
    </div>
  </div>
</div><!-- modal mudar tema -->

<script type="text/javascript">
	
  function setTitulo(titulo){
    $('#titulo').empty();
    $('#titulo').append(titulo);
  }

  $('select[name=tema]').change(function () {
    var tema = $('#tema').val();           
      $( "html" ).removeClass().addClass(tema);
  });

  function salvarTema(){
    var tema = $('#tema').val();
    var base_url = window.location.origin + '/usuarios/atualizartema/1/'+ tema;

      $.get(base_url, function( data ) {
        $( ".result" ).html( data );
        alert( "Load was performed." );
      });
        
  }
</script>


</body>
</html>
