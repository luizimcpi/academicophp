<?php
  require '../database.php';
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    header("Location: index.php");
    exit;
  } else {
     $usuario = $_SESSION["email"];
     echo "<center><b>Usuário Logado: ".$usuario."</b></center>";
  }

    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM alunos  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: indexAluno.php");
         
    }
?>

<!DOCTYPE html>
<html class="ls-theme-blue">
  <head>
    <title>SisAcadêmico - delete.php</title>

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
        <h1 class="ls-title-intro ls-ico-user">Excluir Aluno</h1>
          <form class="ls-form row" name="alunoForm" action="delete.php" method="post">
              <fieldset>
                         <label class="ls-label col-md-3">
                         <input type="hidden" name="id" value="<?php echo $id;?>"/>
                          <b class="ls-label-text">Você tem certeza que deseja excluir esse aluno?</b>
                         </label>
              </fieldset>
               <div class="ls-actions-btn">
                  <button class="ls-btn" type="submit">Sim</button>
                  <a class="ls-btn-danger" href="indexAluno.php">Não</a>
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
