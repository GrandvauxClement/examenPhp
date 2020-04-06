<?php
require_once 'pdo_connect.php';
require_once 'functions/function-admin.php';
if( $_SERVER['REQUEST_METHOD']=== 'POST'){
    $errors = validateAdminForm();
    if (isset($errors) AND count($errors) == 0) {
       $errors = addAdmin($pdo, $errors);
       if(count($errors) == 0){
        header('Location: admin-work.php');
       }
      
    }
}
?>
<html>
    <head>
<?php require_once 'stylesheets.php' ?>
    </head>
    <h1> Ajouter un nouveau compte pour gérer les articles ! :) </h1>
    <body>
        <form method="POST" action="add-admin.php"> 
            <label> Login de connection </label>
            <input class="form-control" type="text" placeholder="login" name="login">
            <label>Nom de famille</label>
            <input class="form-control" type="text" placeholder="nom" name="nom">
            <label> prenom</label>
            <input class="form-control" type="text" placeholder="prenom" name="prenom">
            <label>Mot de passe</label>
            <input class="form-control" type="password" placeholder="mot de passe" name="password"><br>
            <input type="submit" class="btn btn-success">
            <?php
                    if(isset($errors) AND count($errors)!= 0) {
                        echo('<h2> Erreurs lors de la soumission du formulaire : </h2>');
                        foreach($errors as $error){
                            echo('<div class="error">'.$error.'</div>');
                        }
                    }
                
            ?>
        </form>
    </body>
    
</html>