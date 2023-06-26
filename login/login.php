<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = new PDO('mysql:host=localhost;dbname=projet_multiple', 'root', 'root');
    $pdo->exec("SET  NAMES UTF8");  

    $query = "SELECT * from users where email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $passworddata = $data["Password"];
    
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



    if ($password == $passworddata) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['rank'] = $rank;
        header('Location: ../dashboard.php');
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
    

}





// (include_once("../LoginAndSignup/ifalreadyloged.php"));


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <?php (include_once("../Navbar.php")); ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                            <input class="form-control" type="email" id="email" name="email">
                                            <label for="email">Adresse E-MAIL :</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            
                                            <input class="form-control" type="password" id="password" name="password">
                                            <label for="password">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                              
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a>Copyright - Sébastien Merveille</a>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Connexion">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Pas encore de compte ? Inscris-toi !</a></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
