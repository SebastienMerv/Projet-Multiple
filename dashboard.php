<?php

session_start();

(include_once("Navbar.php"));
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->exec("SET  NAMES UTF8");


// je veux toutes les infromations de la personne ci-dessous
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$userid = $data["Id"];


// $id = $data["Id"]

(include_once("login/iflogged.php"));


$name = $data["Name"];



?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des applications</title>
    <meta charset="utf-8">
    <link href="styledashboard.css" rel="stylesheet">
</head>
<body>
    <h1>Tableau de bord</h1>
    <a href="ToDo/main.php"><img class="todo" src="img/todolist.png" height="200" href="ToDo/main.php"></a>
    
    <a href="notes/main.php"><img class="notes" src="img/Notes.jpg" height="400" href="notes/main.php"></a>






    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php (include_once("footer.php")); ?> 

        
        

</body>
</html>