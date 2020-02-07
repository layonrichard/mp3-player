<?php 
	$username = "root";
	$password = "root";
	$conn = new PDO('mysql:host=localhost;dbname=db_mp3', $username,$password);

	try{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		echo 'Erro com a conexão com a base de dados: ' . $e->getMessage();
	}
?>