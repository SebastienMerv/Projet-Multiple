<?php 

session_start();


// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée




// Bouton de déconnexion
if(isset($_POST['deconnecte'])) { 
    (include_once ("../login/logout.php"));
}
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");


$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION['email']]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $data["Name"];
$surname = $data["Surname"];
$uid = $data["Id"];

$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION["email"]]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['ajouter'])) {
$email = $_POST["email"];
$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$uid = $data["Id"];


$query = "INSERT INTO users_rank (`Rank_id`, `Users_id`) VALUES (?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute(['3', $uid]);





}

$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION["email"]]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);


$uid = $data["Id"];

$query = "SELECT * from users_rank where Users_id = :uid";
$stmt = $pdo->prepare($query);
$stmt->execute(['uid' => $uid]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$rankid = $data["Rank_id"];

$query = "SELECT * from ranks where Id = :rid";
$stmt = $pdo->prepare($query);
$stmt->execute(['rid' => $rankid]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$rank = $data["Name"];


(include_once("ifadmin.php"));

$query = "SELECT *
FROM users_rank ur
LEFT JOIN users u on u.Id = ur.Users_id 
WHERE ur.Rank_id = :rid";
$stmt = $pdo->prepare($query);
$stmt->execute(['rid' => '3']);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);







if(isset($_POST['deleteadmin'])) {
    $usertoselect = $_POST['usertodelete'];
    $query = "UPDATE `users_rank` SET `Rank_id`='2',`Users_id`='$usertoselect' WHERE Users_id = :uid";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['uid' => $usertoselect]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrateur - Ajouter un admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Sébastien Merveille</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../profile.php">Profil utilisateur</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><form action="" method="post"><button class="dropdown-item" type="submit" name="deconnecte">Déconnexion</button></li></form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Accueil</div>
                            <a class="nav-link" href="admindashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="makeadmin.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Ajouter un Admin    
                            </a>
                            <a class="nav-link" href="modifyserverinfo.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                Informations serveur
                            </a>



                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">



                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">

                                        </nav>
                                    </div>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <footer>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que :</div>
                        <?= $name; ?> <?= $surname; ?>
                    </div>
                    </footer>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Sébastien Merveille</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ajouter un administrateur</li>
                        </ol>
                        <form action="makeadmin.php" method="post">
                        <div class="form-floating mb-3">
                                            
                                            <input class="form-control" type="email" id="email" name="email">
                                            <label for="email">Adresse E-MAIL :</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                            <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

                                            
                                            </div>
                                            </form>
                                            <br>
                                            </div>
                                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Id des utilisateurs ayant les privilèges administrateur
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead>
                                
                                    <tr>
                                        <th>Rang</th>
                                        <th>Utilisateur</th>
                                        <th>Action</th>

                                        <?php foreach($data as $row): ?>
                                    </tr>
                                </thead>
                                    

                                    <td>Administrateur</td>
                                    <td><?= $row["Surname"]; ?> <?= $row["Name"]; ?></td>
                                    <td>
                                        <form action="" method="post">
                                                <input type="hidden" name="usertodelete" value="<?= $row["Id"]; ?>">

                                                <button type="submit" name="deleteadmin" class="btn btn-danger">Supprimer</button>
                                        </td>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sébastien Merveille 2023</div>
                            <div>

                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
