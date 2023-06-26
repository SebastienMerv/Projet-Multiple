<?php session_start(); ?>

<html>
  <head>
	<meta charset="utf-8">
  </head>
<body>
<?php 
  (include_once("Navbar.php"));
  $_SESSION["logged_in"] = false;



?>







</body>

</html>

<?php


$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->exec("SET  NAMES UTF8");

$sql = "SELECT * FROM users";
$result = $pdo->query($sql);

?> 
<?php (include_once("footer.php")); ?> 