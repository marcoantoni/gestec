@section('menu')

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
        <span class="ls-name">Marco Antoni</span>
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
                <li><a href="{{ route('funcionarios.index')}}"><span class="glyphicon glyphicon-th-list"></span> Ver todos</a></li>
              </ul>
            </li>
            
            <!-- outros -->
           <li>
            <a href="#" class="ls-ico-list3" title="Outros cadastros/relatórios">Outros</a>
            <ul>
              <li><a href="{{ route('marca.create') }}"><span class="glyphicon glyphicon-registration-mark"></span> Marcas</a></li>
                  <li><a href="{{ route('modelos.index') }}"><span class="glyphicon glyphicon-blackboard"></span> Modelos</a></li>
                  <li><a href="{{ route('problemas.create') }}"><span class="glyphicon glyphicon-question-sign"></span> Problemas</a></li>
                  <li><a href="{{ route('lotacao.create') }}"><span class="glyphicon glyphicon-map-marker"></span> Locais</a></li>
            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


@stop