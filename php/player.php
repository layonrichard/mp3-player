<?php 
  session_start();
  isset($_SESSION['logado']) ? $logado = $_SESSION['logado'] : $logado = false;
  if(!$logado) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <div class="section">
      <div id="player">
        <h4><i class="material-icons">library_music</i>MP3 Player</h4>
        <div class="card">
          <div class="card-image">
          </div>
          <div class="card-content green-text">
            <h5>Title</h5>
            <p class="artist">Artist</p>
            <div class="row valign-wrapper">
              <div class="col s2" id="current-duration">00:00</div>
              <div class="col s6 range-field valign-wrapper">
                <input type="range" min="0" max="0" id="seekbar" step="1" />
              </div>
              <div class="col s2" id="total-duration">00:00</div>
              <div>
                <a href="#">
                  <i class="material-icons" id="mute">volume_up</i>
                </a>
              </div>
              <div class="col s3 range-field valign-wrapper">
                <input id="vol-control" type="range" min="0" max="100" step="1">
              </div>
            </div>
          </div>
          <div>
            <div class="buttons center">
              <button class="btn-large btn-floating black green-text"><i class="material-icons green-text" id="play-before">navigate_before</i></button>
              <a href="#" class="btn-floating btn-large">
                <i class="material-icons" id="play-pause">play_arrow</i>
              </a>
              <button class="btn-large btn-floating black"><i class="material-icons green-text" id="play-next">navigate_next</i></button>
            </div>
          </div>
        </div>
        <div class="section">
          <div class="row">
            <ul class="collection with-header">
              <li class="collection-item black green-text"><div class="song-name" id="song-list"><a href="#!"><i class="material-icons right green-text">play_arrow</i></a></div></li>
            </ul>
          </div>  
        </div>
      </div>  
    </div>
    <script src="../index.js" type="module"></script>
  </body>
</html>

