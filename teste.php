<?php 
require_once 'php/conn.php';
$query = $conn->query('SELECT tb_musica.nm_titulo as "title", tb_musica.nm_autorMusica as "artist", tb_imagem_musica.nm_imagem as "cover", tb_musica.nm_titulo as "file" FROM tb_musica, tb_imagem_musica');
$query = $query->fetchAll(PDO::FETCH_OBJ);
$json = json_encode($query, JSON_PRETTY_PRINT);
foreach ($json as $key) {
	echo $value;
}
$ex = explode(":", $json);
echo $ex;
echo $json;
?>