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







if (isset($_POST['addtask'])) {
    $posttask = $_POST['task'];
    $duedate = $_POST["duedate"];
    $query = "INSERT INTO task (status, Id_user, name, due_date) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['En cours', $iddata, $posttask, $duedate]);
}

$query = "SELECT * from task where Id_user = :uid";
$stmt = $pdo->prepare($query);
$stmt->execute(['uid' => $iddata]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['delete']) && isset($_POST['task'])) {
    $taskselect = $_POST['task'];
    $query = "DELETE FROM task WHERE id = :tid AND Id_user = :uid";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['tid' => $taskselect, 'uid' => $iddata]);

    
}

if(isset($_POST['termine'])) {
    $taskselect = $_POST['task'];
    $query = "UPDATE `task` SET `status`='Termine',`id`='$taskselect',`Id_user`=:uid WHERE id = :tid AND Id_user = :uid";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['tid' => $taskselect, 'uid' => $iddata]);
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
            <input class="form-control" type="text" id="task" name="task">
            <label for="ajouter">Tâche :</label>
            </div>
            <div class="form-floating mb-3">
            <input class="form-control" type="text" id="duedate" name="duedate">
            <label for="dudate">Date d'échéance :</label>
            </div>
            
        <button name="addtask" class="btn btn-primary">Ajouter une tache</button>
    </form>
    <table>
    <?php foreach($data as $row): ?>
    <tr>
        <td><?= $row["name"]; ?></td>
        <td><?= $row["status"]; ?></td>
        <td><?= $row["due_date"];?></td>

        <td>
            <form action="" method="post">
                <input type="hidden" name="task" value="<?= $row["id"]; ?>">

                <button type="submit" name="delete" class="btn btn-primary">Supprimer</button>
                <button type="submit" name="termine" class="btn btn-primary">Tâche terminée</button>
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