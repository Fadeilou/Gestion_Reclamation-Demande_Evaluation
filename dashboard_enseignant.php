<?php
    session_start();

    require('bd/connexionDB.php');

    if(!isset($_SESSION['id_user'])){ 
        header('Location: login.php'); 
        exit; 
    }
    
    // Faire une requete pour requperer les information du profil de l'utilisateur connecte 
    $req = $DB->query("SELECT *
    FROM profil
    WHERE id_user = ?",
    array($_SESSION['id_user']));
    $req = $req->fetch();


    //Stocker dans des variables les information de profil
    $_SESSION['id_profil'] = $req['id'];
    $_SESSION['id_groupe_pedagogique'] = $req['id_groupe_pedagogique'];
    $_SESSION['id_position'] = $req['id_position'];
    $_SESSION['nom'] = $req['com_nom'];
    $_SESSION['prenom'] = $req['com_prenom'];
    $_SESSION['telephone'] = $req['com_num_telephone'];
    $_SESSION['addresse'] = $req['com_addresse'];
    $_SESSION['diplome'] = $req['com_diplome'];
    $_SESSION['id_filiere'] = $req['id_filiere_app'];
    $_SESSION['matricule'] = $req['com_matricule'];
    $_SESSION['sexe'] = $req['com_genre'];
    $_SESSION['specialite_principal'] = $req['ens_specialite_principal'];
    $_SESSION['specialite_secondaire'] = $req['ens_specialite_complementaire'];


    $req = $DB->query("SELECT groupe_pedagogique.designation
    FROM groupe_pedagogique
    WHERE id = ?",
    array($_SESSION['id_groupe_pedagogique']));
    $req = $req->fetch();
    $_SESSION['groupe_pedagogique'] = $req['designation'];

    $req = $DB->query("SELECT position.appelation
    FROM position
    WHERE id = ?",
    array($_SESSION['id_position']));
    $req = $req->fetch();
    $_SESSION['position'] = $req['appelation'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div style="width: 33px;"><i class="fa fa-star" style="height: -5px;"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>INSTI</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profil_enseignant.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="fas fa-power-off"></i><span>Login</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="deconnexion.php"><i class="fas fa-user-circle"></i><span>Deconnexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><a class="navbar-brand" href="#">Teacher Page</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    
                </div>
            </nav>
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Bienvenue cher enseignant</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-4">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"></div>
                                            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="voir_reclamation.php"><span>Voir les demandes de reclamation</span>&nbsp;</a></div>
                                        <div class="col-auto"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"></div>
                                            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="voir_demande_evaluation.php"><span>Voir les demandes d'evaluation</span>&nbsp;</a></div>
                                        <div class="col-auto"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
                
            </div>
        </div>
       
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © INSTI 2021</span></div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>