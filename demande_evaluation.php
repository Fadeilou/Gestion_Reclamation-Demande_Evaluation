<?php

    session_start();

    require("bd/connexionDB.php");
    require("fonction.php");

    // Faire une requete pour requperer les information du profil de l'utilisateur connecte 
    $req = $DB->query("SELECT *
    FROM profil
    WHERE id_user = ?",
    array($_SESSION['id_user']));
    $req = $req->fetch();

    $_SESSION['id_profil'] = $req['id'];// Stocker l'id du profil dans la variable session
    $_SESSION['id_groupe_pedagogique'] = $req['id_groupe_pedagogique'];// Stocker l'id du profil dans la variable session
    $_SESSION['id_position'] = $req['id_position'];
    $_SESSION['nom'] = $req['com_nom'];
    $_SESSION['prenom'] = $req['com_prenom'];
    $_SESSION['id_filiere'] = $req['id_filiere_app'];

    $extension = array("pdf", "jpg", "jpeg", "docx");

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if(isset($_POST['demande'])){
            $reclamationMotif = trim($reclamationMotif);
            $motifDescription = trim($motifDescription);

            if(empty($reclamationMotif)){
                $valid = false;
                $er_reclamationMotif = "Signifier le motif de votre reclamation";
            }

            if(empty($motifDescription)){
                $valid = false;
                $er_motifDescription = "Veillez faire une bref explication de votre motif";
            }

            $resultat = verifyExtensionEvaluation($_FILES['paymentProof']['name'], $extension, $_FILES['paymentProof']['size'], $_FILES['paymentProof']['tmp_name'], $_SESSION['nom'], $_SESSION['prenom']);
            $filePath = getFilePathEvaluation($_FILES['paymentProof']['name'], $extension, $_SESSION['nom'], $_SESSION['prenom']);

            if($resultat){
                echo "sucess";
         
            }else if($resultat == "upload_error"){
                echo "upload_error";
            }else if($resultat == "size_error"){
                echo "size_error";
            }else if($resultat == "extension_error"){
                echo "extension_error";
            }

            if($valid){
                $reclamationSuccess = "Votre demande d'evaluation a bien ete envoyer";

                 $DB->insert("INSERT INTO demande_evaluation (id_profile, id_semestre_academique, id_type_evaluation, id_UE, motif, description_motif, fichier_preuve, date_demande, id_filiere) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
                 array($_SESSION['id_profil'], $semester, $evaluationType, $ue, $reclamationMotif, $motifDescription, $filePath, date('y-m-d'), $_SESSION['id_filiere']));
            }
        }
    }

?>



<!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>Demande d'évaluation</title>
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
            <link rel="stylesheet" href="assets/css/animate.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/aos.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/aos.css">
            <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
            <link rel="stylesheet" href="../bootstrap/assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
            <link rel="stylesheet" href="../bootstrap/assets/fonts/fontawesome-all.min.css">
        
        </head>

        <body>
            <div class="register-photo" id="wrapper">

                <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                    <div class="container-fluid d-flex flex-column p-0">
                        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                        </a>
                        <hr class="sidebar-divider my-0">
                        <ul class="nav navbar-nav text-light" id="accordionSidebar">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard_etudiant.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="etudiant_profil.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="deconnexion.php"><i class="fas fa-user-circle"></i><span>Deconnexion</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="reclamation.php"><i class="fas fa-table"></i><span>Demande de Réclamation</span></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="demande_evaluation.php"><i class="fas fa-table"></i><span>Demande d'évaluation</span></a></li>
                        </ul>
                        <div class="text-center d-none d-md-inline">
                            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                        </div>
                    </div>
                </nav>

                <div class="form-container shadow">
                    <form data-bs-hover-animate="pulse" method="post">
                        <h2 class="text-center" data-aos="fade-down" data-aos-duration="600" data-aos-delay="400" style="font-size: 29px;"><strong>Demande d'évaluation</strong></h2>
                
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;">Type d'évaluation</label>
                                    <select class="form-control" name="evaluationType">
                                        <optgroup label="Type d'évaluation">
                                            <?php
                                               $req = $DB->query("SELECT type_evaluation.appelation,type_evaluation.id
                                               FROM type_evaluation",array());

                                               foreach ($req ->fetchAll(PDO::FETCH_OBJ) as $result){
                                                   $id_type_evaluation = $result ->id;
                                                   $type_evaluation_appelation = $result->appelation;

                                                   echo "<option value= '$id_type_evaluation'>$type_evaluation_appelation</option>";  
                                               }  
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;">UE concerné</label>
                                    <select class="form-control" name="ue">
                                        <optgroup label="UE Concerné">
                                            <?php
                                                $req = $DB->query("SELECT UE_groupe_pedagogique_semestre_map.id_UE
                                                FROM UE_groupe_pedagogique_semestre_map
                                                WHERE id_groupe_pedagogique = ?",
                                                array($_SESSION['id_groupe_pedagogique']));
                                            
                                                foreach ($req ->fetchAll(PDO::FETCH_OBJ) as $result){
                                                    $id_UE = $result ->id_UE;
                                            
                                                    $req = $DB->query("SELECT UE.abreviation,UE.id
                                                    FROM UE
                                                    WHERE id = ?",
                                                    array($id_UE));
                                            
                                                    $req = $req ->fetch();
 
                                                    $abreviation = $req['abreviation'];
                                                    $id = $req['id']; 
 
                                                    echo "<option value= '$id'>$abreviation</option>";
                                                }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label style="font-weight: normal;"> Motif </label>
                                    <input class="form-control" type="text" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600" name="reclamationMotif" >
                                </div>
                   
                                <div class="col">
                                    <label style="font-weight: normal;"> Description du Motif </label>
                                    <input class="form-control" type="text-area" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="motifDescription" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                                    <label style="font-weight: normal;">Semestre concerné</label>
                                    <select class="form-control" name="semester">
                                        <optgroup label="Semestre Concerné">
                                            <?php
                                                $req = $DB->query("SELECT semestre_academique.designation,semestre_academique.id
                                                FROM semestre_academique",array());


                                                foreach ($req ->fetchAll(PDO::FETCH_OBJ) as $result){
                                                    $id_semestre_academique = $result ->id;
                                                    $semestre_academique_designation = $result->designation;

                                                    echo "<option value= '$id_semestre_academique'>$semestre_academique_designation</option>";  
                                                } 
                                                
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col">
                                    <label style="font-weight: normal;"> Document preuve </label>
                                    <input class="form-control" type="file" data-aos="fade-right" data-aos-duration="700" data-aos-delay="600" name="paymentProof1">   
                                </div>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" data-aos="fade-down" data-aos-duration="750" data-aos-delay="600" type="submit" name = "demande" style=" font-weight:bold;" >Envoyer</button>
                        </div>
                    </form>

    
                </div>
            </div>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/bs-init.js"></script>
            <script src="assets/js/aos.js"></script>
            <script src="assets/js/aos.js"></script>
        </body>
    </html>


