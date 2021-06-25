<?php
    session_start();

    require_once ("bd/connexionDB.php");

    // Faire une requete pour requperer les information du profil de l'utilisateur connecte 
   /* $req = $DB->query("SELECT *
    FROM profil
    WHERE id_user = ?",
    array($_SESSION['id_user']));
    $req = $req->fetch();


    //Stocker dans des variables les information de profil
    $id_profil = $req['id'];
    $id_groupe_pedagogique = $req['id_groupe_pedagogique'];
    $id_position = $req['id_position'];
    $nom = $req['com_nom'];
    $prenom = $req['com_prenom'];
    $telephone = $req['com_num_telephone'];
    $addresse = $req['com_addresse'];
    $diplome = $req['com_diplome'];
    $_SESSION['id_filiere'] = $req['id_filiere_app'];
    $matricule = $req['com_matricule'];
    $sexe = $req['com_genre'];
    $specialite_principal = $req['ens_specialite_principal'];
    $specialite_secondaire = $req['ens_specialite_complementaire'];


    $req = $DB->query("SELECT groupe_pedagogique.designation
    FROM groupe_pedagogique
    WHERE id = ?",
    array($id_groupe_pedagogique));
    $req = $req->fetch();
    $groupe_pedagogique = $req['designation'];

    $req = $DB->query("SELECT position.appelation
    FROM position
    WHERE id = ?",
    array($id_position));
    $req = $req->fetch();
    $position = $req['appelation'];

    // $req = $DB->query("SELECT filiere.designation
    // FROM filiere
    // WHERE id = ?",
    // array($id_filiere));
    // $req = $req->fetch();
    // $filiere = $req['designation'];*/






?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="icon" type="image/jpeg" sizes="292x350" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="640x426" href="assets/img/profil.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" data-aos="fade-right" data-aos-duration="700" data-aos-delay="200">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>insti</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard_personnel.php"><i class="fas fa-tachometer-alt"></i><span>Tableau de Bord</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="etudiant_profil.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="deconnexion.php"><i class="fas fa-user-circle"></i><span>Deconnexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Rechercher ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Rechercher ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">1+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Centre de notification</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">Date d'envoie</span>
                                                <p>Une notification</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Voir tous les notifications&nbsp;</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">User<i class="fa fa-user border rounded" style="padding: 11px;font-size: 16px;"></i></span></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="profileE.html"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item disabled" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4" data-aos="zoom-in" data-aos-duration="650" style="font-weight: bold;">Profile</h3>
            <div class="row mb-3" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="200">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center shadow" style="height: 339.333px;"><img class="rounded-circle mb-3 mt-4" src="assets/img/profil.jpg" width="160" height="160">
                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="button" style="font-weight: bold;">Modifier la Photo</button></div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Avis sur votre Stage</h6>
                        </div>
                        <div class="card-body">
                            <div class="card" data-toggle="tooltip" data-bs-tooltip="" title="Date de pblication">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col col-lg-6">
                                            <h6 class="text-nowrap text-truncate mb-0" style="font-weight: bold;">Entreprise</h6>
                                        </div>
                                        <div class="col col-lg-6">
                                            <h6 class="text-nowrap text-truncate mb-0" style="font-weight: bold;">Auteur</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Avis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Paramètres de l'utilisateur</p>
                                </div>
                                <div class="card-body" style="font-size: 14px;">
                                    <ul class="list-group">
                                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">Nom : <?php echo $_SESSION['nom'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">Prénoms : <?php echo $_SESSION['prenom'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">Position : <?php echo $_SESSION['position'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;font-size: 12px;">Specialite principal : <?php echo $_SESSION['specialite_principal'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Specialite secondaire : <?php echo $_SESSION['specialite_secondaire'];?> &nbsp;&nbsp;</span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Adresse Email : <?php echo $_SESSION['email'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Sexe : <?php echo $_SESSION['sexe'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Diplome de base : <?php echo $_SESSION['diplome'];?>&nbsp;</span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Adresse : <?php echo $_SESSION['addresse'];?>&nbsp;</span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">N° Matricule : <?php echo $_SESSION['matricule'];?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;">Téléphone : <?php echo $_SESSION['telephone'];?></span></li>
                                    </ul>
                                </div>
                                <div class="card-footer"><a class="btn btn-primary float-right btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Éditer le profil"><i class="fas fa-user-edit text-white"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" data-aos="fade-up" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>