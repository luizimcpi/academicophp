<!DOCTYPE html>
<html class="ls-theme-blue">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>SisAcademico - Login</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link href="https://assets.locaweb.com.br/locastyle/3.6.0/stylesheets/locastyle.css" rel="stylesheet" type="text/css" />
</head>
<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">

<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <div class="ls-login-box">
        <h1 class="ls-login-logo"><img title="Logo login" src="arquivos/img/student-icon.png" /></h1>
        <div class="doc-intro-content">
          <center><h1>SisAcadêmico</h1></center>
        </div>
        <form role="form" class="ls-form ls-login-form" action="authentication.php" method="post">
          <fieldset>

            <label class="ls-label">
              <b class="ls-label-text ls-hidden-accessible">Usuário</b>
              <input class="ls-login-bg-user ls-field-lg" type="text" name="email" placeholder="Usuário" required autofocus>
            </label>

            <label class="ls-label">
              <b class="ls-label-text ls-hidden-accessible">Senha</b>
              <div class="ls-prefix-group">
                <input id="password_field" class="ls-login-bg-password ls-field-lg" name="senha" type="password" placeholder="Senha" required>
                <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
              </div>
            </label>

            <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="https://assets.locaweb.com.br/locastyle/3.6.0/javascripts/locastyle.js" type="text/javascript"></script>

</body>
</html>
