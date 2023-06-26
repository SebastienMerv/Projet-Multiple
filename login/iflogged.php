<?php
// Récupération de l'id et de l'email
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$name =  $data["Name"];
$surname = $data["Surname"];

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../../projet_multiple/login/login.php');
    exit;
}

?>