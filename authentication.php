<html>
	<head>
		<title>Autenticando...</title>
		<script type="text/javascript">
			function loginsucesso(){
				setTimeout("window.location='aluno/indexAluno.php'",5000);
			}
			function loginfalha(){
				setTimeout("window.location='index.php'",3000);
			}
		</script>
	</head>
	<body>

	<?php
	     require 'database.php';
	 	 if ( !empty($_POST['email']) && !empty($_POST['senha'])) {
	        $email=$_POST['email'];
			$senha=md5($_POST['senha']);
	       
	      	$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "SELECT * FROM usuarios where email = ? and senha = ?";
	        $q = $pdo->prepare($sql);
	        $q->execute(array($email,$senha));
	        $data = $q->fetch(PDO::FETCH_ASSOC);
	        if($data != null){
	        	session_start();
				$_SESSION['email']=$_POST['email'];
				$_SESSION['senha']=$_POST['senha'];
				echo "<center><img src=\"arquivos/img/loading.gif\"></center>";
				echo "<script>loginsucesso()</script>";
	        }else{
	        	echo "<center>Nome de usuário ou senha inválido(s)! Tente novamente em alguns segundos.</center>";
				echo "<script>loginfalha()</script>";
	        }
	        Database::disconnect();
	        
	    }
	?>
	</body>
</html>