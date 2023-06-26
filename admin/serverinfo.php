<?php




// Pour être sûr d'être connecté
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée

// Récupération de l'id et de l'email
$query = "SELECT * from `infoserver`";
$stmt = $pdo->prepare($query);
$stmt->execute([]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$newstitle = $data["News_title"];
$newsdescription = $data["News_description"];
$newsdate = $data["News_date"];

