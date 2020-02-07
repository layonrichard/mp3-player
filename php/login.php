<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RocketCast</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
<?php 
	require_once 'conn.php';
	isset($_POST['conectado']) ? $conectado = $_POST['conectado'] : $conectado = false;
	if(!$conectado){
		session_cache_limiter('private');
		$cache_limiter = session_cache_limiter();
		/* define o prazo do cache */
		session_cache_expire(1);
		$cache_expire = session_cache_expire();
	}
	session_start();
	isset($_SESSION['logado']) ? $logado = $_SESSION['logado'] : $logado = false;
  	if($logado) {header("location: player.php"); die();}
  	else {
		isset($_POST['usuario']) ? $usuario = $_POST['usuario'] : $usuario = '';
		isset($_POST['senha']) ? $senha = $_POST['senha'] : $senha = '';
		$select = $conn->query("SELECT cd_senha FROM tb_usuario WHERE nm_login = '".$usuario."'");
		while ($row = $select->fetch(PDO::FETCH_ASSOC)){
			$senha_hash = $row['cd_senha'];
		}
		$confere = password_verify($senha, $senha_hash);
		if($confere){
			$query = 'SELECT * FROM tb_usuario WHERE nm_login = "'.$usuario.'"';

			$rows = $conn->query($query);
			$count = $rows->rowCount();
		}
		if($count > 0){
			$_SESSION['logado'] = true;
			header('Location: player.php');
		}
		else{
			$_SESSION['logado'] = false;	
			?>
			<div id="error-login">
				
			</div>
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
			<script type="text/javascript">
				alert("Usuário ou senha incorretos");
				$('#error-login').append("<a href='index.php' class='btn'>Voltar</a>");
			</script>
		  </body>
		</html>

<?php
		}
	}
?>