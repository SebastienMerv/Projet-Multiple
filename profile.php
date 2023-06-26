<?php
session_start();



// Pour être sûr d'être connecté
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

$name =  $data["Name"];
$surname = $data["Surname"];
$userid = $data["Id"];


$description = $data["Description"];



if (isset($_POST['change'])) {

  $email = $_POST['email'];
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $query = "UPDATE `users` SET `Name`=?, `Surname`=?, `email`=? WHERE Id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$name, $surname, $email, $userid]);
  header('Location: profile.php');
}

if(isset($_POST['deconnecte'])) { //Si je mets un peu virgule avant l'acolade je demande à ce que la conditons sois execute à chaque fois
  (include_once ("login/logout.php"));
}




(include_once("login/iflogged.php"));
(include_once("Navbar.php")); ?>

<head>
<title>Profil</title>
<link href="style.css" rel="stylesheet">
</head>
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->

        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">

          </div>
        </form>
        <!-- User -->
    
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenue</h6>
              </div>

            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Bienvenue <?= $surname ?> </h1>
            <p class="text-white mt-0 mb-5">Ici, tu peux voir tes données de compte.</p>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">

            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">

              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">    
              <div class="text-center">
                <h3>
                  <?= $name;?> <?=$surname?>
                </h3>
                <div class="h5 font-weight-300">
                  <?php 
                  if($_SESSION["rank"] == "Administrateur") {
                    echo "<a class='ni location_pin mr-2' href='admin/admindashboard.php'>Panel Admin</a>";
                  }
                  
                  ?>
                </div>
 
                <hr class="my-4">
                <p><?=$description?></p>
                <a class="btn btn-primary" href="changedesc.php">Changer de bio</a>
                <input type="submit" name="deconnecte" class="btn btn-danger" value="Déconnexion">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mon compte</h3>
                </div>

              </div>
            </div>
            
            <div class="card-body">
              <form action="" method="post">
                <h6 class="heading-small text-muted mb-4">Information utilisateur</h6>
                <div class="pl-lg-4">
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <label class="form-control-label" for="email">Email</label>
                        <input name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="<?= $_SESSION["email"]?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Rôle</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?=$_SESSION["rank"]?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Prénom</label>
                        <input name="surname" id="surname" class="form-control form-control-alternative" placeholder="First name" value="<?=$surname?>">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Nom de famille</label>
                        <input name="name" id="name" class="form-control form-control-alternative" placeholder="Last name" value="<?=$name?>">
                      </div>
                      
                
                    </div>
                  </div>
                  <input type="submit" name="change" class="btn btn-primary" value="Valider">
                </div>
               
                </form>
              
                
                <hr class="my-4">

                <div class="modal" tabindex="-1">

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php (include_once("footer.php")); ?>

</body>