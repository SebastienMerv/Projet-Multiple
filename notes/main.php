<?php
session_start();
(include_once("../Navbar.php"));


// Pour être sûr d'être connecté
(include_once("../login/iflogged.php"));
// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée

// Récupération de l'id et de l'email
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$iddata =  $data["Id"];







if (isset($_POST['addnote'])) {
    $postnote = $_POST['note'];
    $query = "INSERT INTO notes (User_id, Text) VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$iddata, $postnote,]);
}

$query = "SELECT * from notes where User_id = :uid";
$stmt = $pdo->prepare($query);
$stmt->execute(['uid' => $iddata]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['delete']) && isset($_POST['note'])) {
    $noteselect = $_POST['note'];
    $query = "DELETE FROM notes WHERE Note_id = :nid AND User_id = :uid";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['nid' => $noteselect, 'uid' => $iddata]);

    
}


?>




<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
    <meta charset="utf-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <h1>To-Do List</h1>
    <br>
    <br>
    <form action="" method="post">
        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="note" name="note">
            <label for="note">Note</label>
            </div>

            
        <button name="addnote" class="btn btn-primary">Ajouter une note</button>
    </form>
    <table>
    <?php foreach($data as $row): ?>
    <tr>
        <td><?= $row["Text"]; ?></td>

        <td>
            <form action="" method="post">
                <input type="hidden" name="note" value="<?= $row["Note_id"]; ?>">

                <button type="submit" name="delete" class="btn btn-primary">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>



</body>

</html>