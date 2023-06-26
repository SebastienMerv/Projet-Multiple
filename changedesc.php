<?php

session_start();
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$uid = $data["Id"];

if (isset($_POST['submit'])) {
    $bioselect = $_POST['bio'];
    $query = "UPDATE `users` SET `Description`=? WHERE Id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$bioselect, $uid]);
    header('Location: profile.php');
  }

  ?>


<html>
    <head>
        <meta charset="utf-8">
        <title>Changer de description</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <br>
        
    <div class="col-lg-6">
                    <form action="" method="post">
                      <div class="form-group focused">

                        <label class="form-control-label" for="input-username">Changer de biographie : - Bêta</label>
                        <input class="form-control" type="text" id="bio" name="bio">
                        
                        
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Valider">
                      <form>
                    </div>


                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

                    
    </body>
</html>
