<?php

// Créer une conexion
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->exec("SET  NAMES UTF8");

if (
  isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) 

  && 
  
  !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) 
) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $surname = $_POST['surname'];

  $sql = "INSERT INTO users(`Name`, `Surname`, `email`, `Password`, `Description`) VALUES (?, ?, ?, ?, ?)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$_POST["name"],$surname, $email, $password, 'Un utilisateur ta peur']);
}
 
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$userid = $data["id"];


$query = "SELECT * from users_rank";
$stmt = $pdo->prepare($query);
$stmt->execute(['userid' => $userid]);





$query = "INSERT INTO users_rank(`Rank_id`, `Users_id`) VALUES (?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute(['1', $userid]);   
$data = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: login.php");
?>

