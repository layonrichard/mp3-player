<?php 
	require_once 'conn.php';
	/*$query = $conn->query('SELECT * FROM tb_musica');
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		$json = json_encode($row);
		echo $json ;
	}
	$fp = fopen('../data.js', 'w');
	$w = fwrite($fp, $json);
	if($w) echo "foi";
	else echo "n foi";
	var_dump($w);
	fclose($fp);*/
?>
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
  	<nav>
      <div class="nav-wrapper black">
        <a href="logout.php" class="brand-logo right green-text">Sair <i class="material-icons right">exit_to_app</i></a>
      </div>
    </nav>
    <div class="row z-depth-2 white container section login">
      <form class="col s12 m12 l12" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <h3>Carregar nova música</h3>
            <hr>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <textarea id="descricao" class="materialize-textarea" name="descricao"></textarea>
            <label for="descricao">Descrição</label>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="autor" type="text" class="validate" name="autor" required>
            <label for="autor">Autor</label>
          </div>
          <div class="col s10 offset-s2 m10 offset-m2 l8 offset-l2">
          	<div class="file-field input-field ">
          		<div class="btn black green-text">
          			<span>Música</span>
          			<input type="file" name="musica">
          		</div>
          		<div class="file-path-wrapper">
          			<input type="text" class="file-path validate">
          		</div>
          	</div>
          </div>
          <div class="col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <div class="file-field input-field ">
              <div class="btn black green-text">
                <span>Capa da música</span>
                <input type="file" name="capa">
              </div>
              <div class="file-path-wrapper">
                <input type="text" class="file-path validate">
              </div>
            </div>
          </div>
          <div class="input-field  col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <button class="waves-effect waves-light btn black green-text right" type="submit">Cadastrar
            </button>
          </div>
        </div>    
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
