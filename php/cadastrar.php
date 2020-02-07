<?php 
	require_once 'conn.php';
	session_start();
	isset($_SESSION['logado']) ? $logado = $_SESSION['logado'] : $logado = false;
  	if($logado) header("location: player.php");

	isset($_POST['nome']) ? $nome = $_POST['nome'] : $nome = '';
	isset($_POST['login']) ? $usuario = $_POST['login'] : $usuario= '';
	isset($_POST['senha']) ? $senha = $_POST['senha'] : $senha = '';
	$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

	$select = $conn->query("SELECT nm_login FROM tb_usuario");
	while($row = $select->fetch(PDO::FETCH_ASSOC)){
		if($usuario == $row['nm_login']) echo "Já tem amigo";
	}
	try{
		$stmt = $conn->prepare('INSERT INTO tb_usuario VALUES (default, :nome, :usuario, :senha)');
		$stmt->execute(array(
			':nome' => $nome,
			':usuario' => $usuario,
			':senha' => $senha_hash
		));

		echo $stmt->rowCount();
	} catch (PDOException $e){
		echo 'Erro ao tentar cadastrar: ' . $e->getMessage();
	}
?>