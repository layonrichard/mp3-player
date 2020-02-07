<?php 
  require_once 'conn.php';
  session_start();
  isset($_SESSION['logado']) ? $logado = $_SESSION['logado'] : $logado = false;
  if($logado) header("location: player.php");
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
    <div class="row z-depth-2 white container section login">
      <form class="col s12 m12 l12" action="cadastrar.php" method="post">
        <div class="row">
          <div class="col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <h3>Cadastro</h3>
            <hr>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="user_name" type="text" class="validate" name="nome" required>
            <label for="user_name">Nome</label>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="login" type="text" class="validate" name="login" required>
            <label for="login">Usuário</label>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="password" type="password" class="validate" name="senha" required>
            <label for="password">Senha</label>
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
