<?php

if ($_SESSION["logged_in"] == true

&&

$_SESSION["rank"] == 'Administrateur'
) 
{


// Récupération de l'id et de l'email
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$name =  $data["Name"];
$surname = $data["Surname"];
}


?>