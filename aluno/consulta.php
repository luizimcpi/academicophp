<?php
    require '../database.php';
    session_start();
    if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
        header("Location: ../index.php");
        exit;
    }
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: indexAluno.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM alunos where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html class="ls-theme-blue">
  <head>
    <title>SisAcadêmico - consulta.php</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="https://assets.locaweb.com.br/locastyle/3.6.0/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
  </head>
  <body>
    <div class="ls-topbar">

      <!-- Notification bar -->
      <div class="ls-notification-topbar">
        <!-- User details -->
        <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
          <a href="#" class="ls-ico-user">
            <?php
               $usuario = $_SESSION["email"];
               echo "<b>Usuário Logado: ".$usuario."</b>";
            ?>
          </a>
          <nav class="ls-dropdown-nav ls-user-menu">
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <span class="ls-show-sidebar ls-ico-menu"></span>

      <!-- Nome do produto/marca -->
      <h1 class="ls-brand-name"><a class="ls-ico-screen" href="#">SisAcadêmico</a></h1>
    </div>

    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-user">Consulta Aluno</h1>
          <form class="ls-form row" name="alunoForm">
              <fieldset>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Nome</b>
                  <?php echo $data['nome'];?>
                </label>
                <label class="ls-label col-md-4">
                  <b class="ls-label-text">E-mail</b>
                   <?php echo $data['email'];?>
                </label>
                <label class="ls-label col-md-5">
                  <b class="ls-label-text">Universidade</b>
                  <?php echo $data['universidade'];?>
                </label>
                <label class="ls-label col-md-5">
                  <b class="ls-label-text">Disciplina</b>
                  <?php echo $data['disciplina'];?>
                </label>
                 <label class="ls-label col-md-5">
                  <b class="ls-label-text">Registro do Aluno</b>
                   <?php echo $data['matricula'];?>
                </label>
                 <label class="ls-label col-md-3">
                  <b class="ls-label-text">Exercício 1</b>
                 <?php echo $data['nota_1'];?>
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Prova 1</b>
                  <?php echo $data['nota_2'];?>
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Média</b>
                  <?php echo $data['media_1'];?>
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Exercício 2</b>
                  <?php echo $data['nota_3'];?>
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Prova 2</b>
                 <?php echo $data['nota_4'];?>
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Média</b>
                  <?php echo $data['media_2'];?>
                </label>
              </fieldset>
               <div class="ls-actions-btn">
                  <a class="ls-btn-danger" href="indexAluno.php">Voltar</a>
              </div>
          </form>
      </div>
    </main>

    <aside class="ls-sidebar">
      <!-- Defails of user account -->
      <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
        <a href="#" class="ls-ico-user">
           <?php
               $usuario = $_SESSION["email"];
               echo "<b>Usuário Logado: ".$usuario."</b>";
            ?>
        </a>
           <nav class="ls-dropdown-nav ls-user-menu">
            <ul>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
      </div>

      <nav class="ls-menu">
        <ul>
          <li><a href="indexAluno.php" class="ls-ico-users">Alunos</a></li>
        </ul>
        <ul>
          <li><a href="indexAluno.php" class="ls-ico-chart-bar-up">Estatísticas</a></li>
        </ul>
      </nav>
    </aside>

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://assets.locaweb.com.br/locastyle/3.6.0/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>