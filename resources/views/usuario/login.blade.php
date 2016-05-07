<!DOCTYPE html>
<html class="ls-theme-gray">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Gestec, gestão de tecnologia da informação">
  <meta name="author" content="Marco Antoni">
  <!-- Coloque o JS no seu FOOTER, logo depois da jQuery -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/lstyle/stylesheets/locastyle.css">
</head>
<body>

<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <div class="ls-login-box">
		  <h1 class="ls-login-logo">Acesso restrito</h1>
		   {{ Form::open(array(
            'url' => 'entrar',
            'class'  => 'ls-form ls-login-form'
        )) }}
            
		    <fieldset>

		      <label class="ls-label">
		        <b class="ls-label-text ls-hidden-accessible">Usuário</b>
		        <input class="ls-login-bg-user ls-field-lg" type="text" placeholder="Usuário" name="login" autofocus>
		      </label>

		      <label class="ls-label">
		        <b class="ls-label-text ls-hidden-accessible">Senha</b>
		        <div class="ls-prefix-group">
		          <input id="password_field" class="ls-login-bg-password ls-field-lg" type="password" name="senha" placeholder="Senha">
		          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
		        </div>
		      </label>

		      <p><a class="ls-login-forgot" href="forgot-password">Esqueci minha senha</a></p>

		      <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">

		    </fieldset>
		  </form>
		</div>
    </div>
  </div>
</div>

</body>

<script src="{{ URL::to('/') }}/scripts.js"></script>
<!-- Coloque o JS no seu FOOTER, logo depois da jQuery -->
<script src="{{ URL::to('/') }}/lstyle/javascripts/locastyle.js"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</html>
