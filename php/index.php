<?php 
  require_once 'conn.php';
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
      <form class="col s12 m12 l12" action="login.php" method="post">
        <div class="row">
          <div class="col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <h3>Login</h3>
            <hr>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="user_name" type="text" class="validate" name="usuario" required>
            <label for="user_name">Usuário</label>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <input id="password" type="password" class="validate" name="senha" required>
            <label for="password">Senha</label>
          </div>
          <div class="switch col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <label>
              <input type="checkbox" name="conectado">
              <span class="lever"></span> Mantanha-me conectado
            </label>
          </div>
          <div class="input-field  col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <button class="waves-effect waves-light btn" type="submmit">Login
            </button>
          </div>
          <div class="input-field col s10 offset-s2 m10 offset-m2 l8 offset-l2">
            <a href="cadastro.php">Ainda não é membro? Crie já uma conta!</a>
          </div>
        </div>    
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
