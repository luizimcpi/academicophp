<!DOCTYPE html>
<html class="ls-theme-blue">
  <head>
    <title>SisAcadêmico - indexAluno.php</title>

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
               include '../database.php';
               session_start();
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
        <h1 class="ls-title-intro ls-ico-home">Bem-Vindo!</h1>
          <section class="container">
                <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <h3>Alunos</h3>
                          </div>
                        </div>
                        </br>
                        <div class="row">
                           <div class="col-md-11">
                            <p>
                              <form class="ls-form row" name="searchForm" action="busca.php" method="GET">
                                <fieldset>
                                  <input type="text" name="consulta" class="form-control"  placeholder="Busca por nome"  required>
                                  <button class="ls-btn-primary ls-ico-search" type="submit">Buscar</button>
                               </fieldset>
                              </form>
                            </p>
                            <p>
                              <a href="create.php" class="ls-btn-primary ls-ico-user">Cadastrar</a>
                            </p>
                            <table class="ls-table ls-table-striped ls-sm-space">
                              <thead>
                                <tr>
                                  <th>Nome</th>
                                  <th>Universidade</th>
                                  <th>Matrícula</th>
                                  <th>Ação</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
                                  header("Location: ../index.php");
                                  exit;
                                } 
                               $pdo = Database::connect();
                               $sql = 'SELECT * FROM alunos ORDER BY id DESC';
                               foreach ($pdo->query($sql) as $row) {
                                        echo '<tr>';
                                        echo '<td>'. $row['nome'] . '</td>';
                                        echo '<td>'. $row['universidade'] . '</td>';
                                        echo '<td>'. $row['matricula'] . '</td>';
                                          echo '<td>';
                                            echo '<a class="ls-btn-primary" href="consulta.php?id='.$row['id'].'">Consultar</a>';
                                            echo ' ';
                                            echo '<a class="ls-btn" href="update.php?id='.$row['id'].'">Alterar</a>';
                                            echo ' ';
                                            echo '<a class="ls-btn-danger" href="delete.php?id='.$row['id'].'">Apagar</a>';
                                            echo '</td>';
                                        echo '</tr>';
                               }
                               Database::disconnect();
                              ?>
                              </tbody>
                        </table>
                      </div>
                    </div>
                </div> <!-- /container -->
            </section>
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