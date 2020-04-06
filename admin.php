<?php
session_start();
require_once 'pdo_connect.php';
require_once 'functions/function-admin.php';
if( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = login($pdo, $_POST['login'], $_POST['password']);
    if(count($errors) == 0){
        header('Location: admin-work.php');
    }
}
?>
<html>
    <head>
        <?php require_once 'stylesheets.php'; ?>
    </head>
    <body class="container">
        <h1>Identifiez-vous chères collègue du Dauphine (login: admin, mot de passe: admin) </h1>
        <form method="POST">
            <label>Nom de Login </label>
            <input class="form-control" name="login" type="text" placeholder="login">
            <label> Mot de passe </label>
            <input class="form-control" name="password" type="password" placeholder="password"> <br>
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