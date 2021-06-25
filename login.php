<?php
    session_start();
    include('bd/connexionDB.php');

     if(isset($_SESSION['id_user'])){
         header('Location: dashboard_etudiant.php');
         exit;
     }


    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if(isset($_POST['connexion'])){
            $email = htmlentities(strtolower(trim($email)));
            $mdp = trim($mdp);

            if(empty($email)){
                $valid = false;
                $er_email = "Il faut mettre un email";
            }

            if(empty($mdp)){
                $valid = false;
                $er_mdp = "Il faut mettre un mot de passe";
            }
            // On fait une requete pour savoir si le couple email/mot de passe exite bien car l'email est unique!
            $req = $DB->query("SELECT *
            FROM user
            WHERE mail = ? AND mdp = ?",
            array($email,$mdp));
            $req = $req->fetch();

            if($req['id'] == ""){
                $valid = false;
                $er_email = "Le mail ou le mot de passe est incorrecte";
            }

            if($valid){
                 $_SESSION['id_user'] = $req['id'];
                 $_SESSION['email'] = $req['mail'];
                 if($req['id_usergroup'] == 4){
                     $_SESSION['id_usergroup'] = $req['id_usergroup'];
                     header('Location: dashboard_etudiant.php');
                     exit;
                  }else if($req['id_usergroup'] == 5){
                      $_SESSION['id_usergroup'] = $req['id_usergroup'];
                      header('Location: dashboard_enseignant.php');
                      exit;
                  }else if($req['id_usergroup'] == 6){
                      $_SESSION['id_usergroup'] = $req['id_usergroup'];
                      header('Location: dashboard_personnel.php');
                      exit;
                  } 
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container">
            <img class="rounded-circle img-fluid" data-aos="fade-right" data-aos-duration="800" data-aos-delay="150" src="assets/img/logo.jpg" style="width: 64px;">
            <a class="navbar-brand font-weight-bold" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="100" href="#">Entreprises de Stage</a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link font-weight-bold" data-bs-hover-animate="rubberBand" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="100" href="index.php">Accueil</a>
                        </li>
                    </ul>
                    <span class="navbar-text actions font-weight-bold" data-bs-hover-animate="pulse" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="100">
                         <a class="login"  href="#login">Se connecter</a>
                         <a class="btn btn-light action-button font-weight-bold" role="button" data-aos="fade-up-left" data-toggle="modal" data-target="#popup">S'inscrire</a>
                    </span>
                </div>

            <div class="modal fade" role="dialog" tabindex="-1" data-bs-hover-animate="pulse" id="popup">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-nowrap" data-aos="zoom-in-up">Type de Compte</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="text-nowrap text-center" method="post">
                                <select class="form-control" data-bs-hover-animate="pulse" style="height: 35px;" name="CptType">
                                    <optgroup label="Compte">
                                        <option value="12" selected="">Etudiant</option>
                                        <option value="13">Agent</option>
                                    </optgroup>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" data-bs-hover-animate="pulse" type="button" data-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary jello animated" type="submit" style="background-color: #1c8293 !important;">Continuer</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <div id="login" class="border rounded-0 register-photo" data-aos="fade-left" data-aos-duration="900" data-aos-delay="350">
        <div class="form-container shadow">
            <div data-aos="zoom-out-up" data-aos-duration="950" data-aos-delay="400" class="image-holder"></div>
            <form class="shadow" method="post">
                
                <h2 class="text-center"><strong>Connexion</strong></h2>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="mdp" name="mdp" placeholder="Password">
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block font-weight-bold" data-bs-hover-animate="pulse" type="submit" name="connexion">Connecter</button>
                </div>
                <a class="already" href="#">Vous n'avez pas un compte? S'inscrire ici</a>
            </form>
        </div>
    </div>

    <div class="text-light bg-dark footer-basic">
        <footer>
            <div class="social"><a data-bs-hover-animate="tada" href="Ressources/Controllers/LoginC.php"><i class="icon ion-social-twitter"></i></a><a data-bs-hover-animate="tada" href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline"></ul>
            <p class="copyright"><?php echo "© Copyright  " . date("Y"); ?></p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/aos.js"></script>
</body>

</html>