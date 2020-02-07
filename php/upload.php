<?php 
	require_once 'conn.php';
	header('Content-Type:' . "application/json");

	session_start();
	/*isset($_SESSION['logado']) ? $logado = $_SESSION['logado'] : $logado = false;
  	if($logado) header("location: player.php");
	*/
	isset($_POST['descricao']) ? $descricao = $_POST['descricao'] : $descricao = '';
	isset($_POST['autor']) ? $autor = $_POST['autor'] : $autor = '';
	//isset($_POST['musica']) ? $musica = $_POST['musica'] : $musica = '';
	$name = $_FILES['musica']['name'];
	$name = strtolower($name);
    $explode = explode(".", $name);
    $name = end($explode);
    $name_2 = prev($explode);
	$dir = '../files';
	$adate = date('Y-m-d');
	$tmp_name = $_FILES['musica']['tmp_name'];
	$tmp_name_img = $_FILES['capa']['tmp_name'];
	$img_name = $_FILES['capa']['name'];
	$msc = $_FILES["musica"]["name"];
	if ($name == 'mp3') {
			echo 'é mp3';
	} else {
		echo 'não é mp3';
		die();
	}
	$query2 = $conn->query('SELECT nm_titulo FROM tb_musica');
	while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {

		if($row['nm_titulo'] == $_FILES['musica']['name']){
			echo 'musica ja tem';
			die();
		} else {
			echo 'musica n tem';
		}
	}
	try{
		$stmt = $conn->prepare('INSERT INTO tb_musica VALUES (default, :adate, :name, :descricao, :autor, 1)');
		$stmt->execute(array(
			':adate' => $adate,
			':name' => $_FILES['musica']['name'],
			':descricao' => $descricao,
			':autor' => $autor
		));
		$query3 = $conn->query('SELECT cd_musica FROM tb_musica WHERE nm_titulo = "'.$_FILES['musica']['name'].'"');
		while ($row2 = $query3->fetch(PDO::FETCH_ASSOC)) {
			$cd = $row2['cd_musica'];
		}
		$stmt2 = $conn->prepare('INSERT INTO tb_imagem_musica VALUES (default, :imagem, :codigo_musica)');
		$stmt2->execute(array(
			':imagem' => $name_2 . '.jpg',
			':codigo_musica' => $cd
		));
	} catch (PDOException $e){
		echo 'Erro ao tentar cadastrar: ' . $e->getMessage();
	}
	if(move_uploaded_file($tmp_name, $dir.'/'.$msc) && move_uploaded_file($tmp_name_img, $dir.'/'.$name_2 . '.jpg')){
		echo $name_2;		
	} else {echo ' n foi ';}
	$query = $conn->query('SELECT tb_musica.cd_musica, tb_musica.nm_titulo as "title", tb_musica.nm_autorMusica as "artist", tb_imagem_musica.nm_imagem as "cover", tb_musica.nm_titulo as "file" 
	FROM tb_musica inner join tb_imagem_musica on tb_musica.cd_musica = tb_imagem_musica.cd_musica;');
	$query = $query->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($query, JSON_PRETTY_PRINT);
	$path = '../data.js';
	$fopen = fopen($path, "w");
	fwrite($fopen, "export default " . $json . ";");
	fclose($fopen);
?>