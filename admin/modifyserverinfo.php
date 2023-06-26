<?php 

session_start();



// Connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");
// Connexion base de donée





if(isset($_POST['deconnecte'])) { //Si je mets un peu virgule avant l'acolade je demande à ce que la conditons sois execute à chaque fois
    (include_once ("../login/logout.php"));
}
$pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET  NAMES UTF8");



(include_once("ifadmin.php"));

$query = "SELECT * from users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION["email"]]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $data["Name"];
$surname = $data["Surname"];


if(isset($_POST['addserver'])) {
    $namepost = $_POST["servername"];
    $descpost = $_POST["serverdesc"];
    $query = "UPDATE `infoserver` SET `Name`='$namepost',`Description`=:descpost WHERE 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['descpost' => '$descpost']);
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
        <title>Administrateur</title>
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
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></i></div>
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
                <br>

                <form action="" method="post">
        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="servername" name="servername">
            <label for="servername">Nom du site :</label>
            </div>
            <div class="form-floating mb-3">
            <input class="form-control" type="text" id="serverdesc" name="serverdesc">
            <label for="serverdesc">Description</label>
            </div>
            
        <button name="addserver" class="btn btn-primary">Envoyer</button>
    </form>




                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sébastien Merveille 2023</div>

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
