<?php
    require_once 'pdo_connect.php';
    require_once 'functions/function-article.php';
?>
<html>
    <head>
        <title>Le Dauphine</title>
        <?php 
            require_once 'stylesheets.php';
        ?>
    </head>
    <body class="container-fluid">
        <?php 
            require_once 'nav.php';
        ?>
        <h1 class="text-danger text-center">Bienvenue sur le site officiel du dauphiné </h1>
        <?php 
            $allannonce = $pdo->query('SELECT * FROM annonce');
            while($annonce = $allannonce->fetch()){
        ?>
        <div class="border border-info rounded m-5">
            <h2 class="text-center text-danger"> <?php echo($annonce['titre']); ?> </h2><br>
            <div class="row">
                <div class="col ">
                    <img class="d-block m-auto" src="images/<?php echo($annonce['image_link']); ?>" style="max-width: 300px">
                </div>
                <div class="col ">
                    <p class=" my-auto"> <?php echo($annonce['contenu']); ?> </p>
                </div>
            </div>
            <h4 class="text-primary ml-3"> Article rédigé par <?php echo($annonce['nom_prenom_utilisateur']) ?></h4>
        </div>
        <?php
            }
            $allannonce-> closeCursor();
        ?>    
    </body>
</html>