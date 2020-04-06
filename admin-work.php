<?php
session_start();
$adminconnect = $_SESSION['utlisateur'];
?>
<html>
    <head>
        <?php require_once 'stylesheets.php' ?>
    </head>
    <body>
        <?php require_once 'nav.php'; ?>
        <div class="container">
            <h1 class="text-center "> Bienvenue <?php echo($adminconnect['nom'].' '.$adminconnect['prenom']) ?> </h1>
            <a href="add-admin.php" class="btn btn-primary d-block mx-auto my-5">Création d'un nouvel accès admin </a> <br>
            <a href="add-article.php" class="btn btn-danger d-block mx-auto my-5">Ajouter un nouvel Article ! </a>
        </div>
    </body>
</html>
