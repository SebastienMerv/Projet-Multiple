<?php
(include_once("/admin/serverinfo.php"));
$servername = $data["Name"];
// Pour être sûr d'être connecté
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée
  $_SESSION["logged_in"] == false;

// Récupération de l'id et de l'email
if($_SESSION["logged_in"] == true) {
$query = "SELECT * from users where email = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$name =  $data["Name"];

}


?>



<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?= $servername?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="../../projet_multiple/index.php" class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a href="../../projet_multiple/dashboard.php" class="nav-link active" aria-current="page" href="#">Tableau de bord</a>
        </li>
          </ul>
        </li>
        </ul> 


      <?php
      if ($_SESSION["logged_in"] == true ) {
        echo "<a href='../../projet_multiple/profile.php' type='button' class='btn btn-primary'>Bonjour, $name</a>";
      }
      else {
        echo "<a href='../../projet_multiple/login/signup.php' type='button' class='btn btn-primary'>Inscription</a>";
        echo "/";
        echo "<a href='../../projet_multiple/login/login.php' type='button' class='btn btn-primary'>Connexion</a>";
      }

      ?>

      
      </form>
    </div>
  </div>
</nav>






    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    </body>
</html>