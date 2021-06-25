<?php
    session_start();

    require('bd/connexionDB.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Acceuil</title>
</head>
<body>
    <h1>Mon site</h1>
    <nav class= "navbar navbar-expand-lg navbar-light bg-light"> 
        <a class="navbar-brand" href="index.php">Acceuil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                    if(!isset($_SESSION['id'])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="modifier-profil.php">Modifier mon profil</a>
                </li>
                <?php
                    }else{
                ?>
                <li class = "nav-item">
                    <a class="nav-link" href="profil.php">Mon profil</a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <ul class="navbar-nav ml-md-auto">
                <?php
                    if(!isset($_SESSION['id'])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Connexion</a>
                </li>
                <?php
                    }else{
                ?>
                <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    
    </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
   