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
  }
  
  if ( !empty($_POST)) {
    
    // keep track post values
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $universidade = $_POST['universidade'];
    $disciplina =  $_POST['disciplina'];
    $matricula = $_POST['matricula'];
    $nota_1 =  $_POST['nota_1'];
    $nota_2 =  $_POST['nota_2'];
    $media_1 = $_POST['media_1'];
    $nota_3 =  $_POST['nota_3'];
    $nota_4 =  $_POST['nota_4'];
    $media_2 = $_POST['media_2'];
    
    // update data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE alunos  set nome = ?, email = ?, universidade = ?, disciplina = ?, matricula = ?, nota_1 = ?, nota_2 = ?, media_1 = ?, nota_3 = ?, nota_4 = ?, media_2 = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$email,$universidade,$disciplina,$matricula,$nota_1,$nota_2,$media_1,$nota_3,$nota_4,$media_2,$id));
    Database::disconnect();
    header("Location: indexAluno.php");
    
  } else {

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM alunos where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $email = $data['email'];
    $universidade = $data['universidade'];
    $disciplina = $data['disciplina'];
    $matricula = $data['matricula'];
    $nota_1 = $data['nota_1'];
    $nota_2 = $data['nota_2'];
    $media_1 = $data['media_1'];
    $nota_3 = $data['nota_3'];
    $nota_4 = $data['nota_4'];
    $media_2 = $data['media_2'];
    Database::disconnect();
  }
?>

<!DOCTYPE html>
<html class="ls-theme-blue">
  <head>
    <title>SisAcadêmico - update.php</title>

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
        <h1 class="ls-title-intro ls-ico-user">Alterar Aluno</h1>
          <form class="ls-form row" name="alunoForm" action="update.php?id=<?php echo $id?>" method="post">
              <fieldset>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Nome</b>
                  <input type="text" name="nome" class="form-control" id="inputNome"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>" required>
                </label>
                <label class="ls-label col-md-4">
                  <b class="ls-label-text">E-mail</b>
                  <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>" >
                </label>
                <label class="ls-label col-md-5">
                  <b class="ls-label-text">Universidade</b>
                  <input type="text" name="universidade" class="form-control" id="inputUniversidade" placeholder="Universidade" value="<?php echo !empty($universidade)?$universidade:'';?>" required>
                </label>
                <label class="ls-label col-md-5">
                  <b class="ls-label-text">Disciplina</b>
                  <input type="text" name="disciplina" class="form-control" id="inputDisciplina" placeholder="Disciplina" value="<?php echo !empty($disciplina)?$disciplina:'';?>" required>
                </label>
                 <label class="ls-label col-md-5">
                  <b class="ls-label-text">Registro do Aluno</b>
                   <input type="text" name="matricula" class="form-control" id="inputMatricula" placeholder="Matricula ou RA" value="<?php echo !empty($matricula)?$matricula:'';?>" required>
                </label>
                 <label class="ls-label col-md-3">
                  <b class="ls-label-text">Exercício 1</b>
                  <input type="text" name="nota_1" class="form-control" id="inputNota1" placeholder="Exercício 1" value="<?php echo !empty($nota_1)?$nota_1:'';?>" >
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Prova 1</b>
                  <input type="text" name="nota_2" class="form-control" id="inputNota2" placeholder="Prova 1" value="<?php echo !empty($nota_2)?$nota_2:'';?>" onchange="javascript:somaMedia1();">
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Média</b>
                  <input type="text" name="media_1" class="form-control" id="inputMedia1" placeholder="Média" value="<?php echo !empty($media_1)?$media_1:'';?>" >
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Exercício 2</b>
                  <input type="text" name="nota_3" class="form-control" id="inputNota3" placeholder="Exercício 2" value="<?php echo !empty($nota_3)?$nota_3:'';?>" >
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Prova 2</b>
                  <input type="text" name="nota_4" class="form-control" id="inputNota4" placeholder="Prova 2" value="<?php echo !empty($nota_4)?$nota_4:'';?>" onchange="javascript:somaMedia2();">
                </label>
                <label class="ls-label col-md-3">
                  <b class="ls-label-text">Média</b>
                  <input type="text" name="media_2" class="form-control" id="inputMedia2" placeholder="Média" value="<?php echo !empty($media_2)?$media_2:'';?>" >
                </label>
              </fieldset>
               <div class="ls-actions-btn">
                  <button class="ls-btn" type="submit">Salvar</button>
                  <a class="ls-btn-danger" href="indexAluno.php">Cancelar</a>
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
<script>
function somaMedia1(){
   $soma = parseFloat($("#inputNota1").val()) + parseFloat($("#inputNota2").val());
   $("#inputMedia1").val($soma);
}
 
function somaMedia2(){
   $soma2 = parseFloat($("#inputNota3").val()) + parseFloat($("#inputNota4").val());
   $("#inputMedia2").val($soma2);
}
</script>