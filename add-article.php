<?php
session_start();
$adminconnect = $_SESSION['utlisateur'];
require_once 'pdo_connect.php';
require_once 'functions/function-article.php';
$errors = [];
$imageUrl = null;
if( $_SERVER['REQUEST_METHOD']=== 'POST'){
    $returnValidation = validateArticleForm();
    $errors = $returnValidation['errors'];
    if (isset($errors) AND count($errors) == 0) {
       addArticle($pdo, $returnValidation['image']);
        header('Location: admin-work.php');      
    }
}
?>
<html>
    <head>
<?php require_once 'stylesheets.php' ?>
    </head>
    <body>
        <?php require_once 'nav.php'; ?>
        <div class="container">
            <h1 class="text-danger"> Ajouter un nouvel Article des plus passionants </h1>
            <form method="POST"  enctype="multipart/form-data"> 
                <label> Ajouter une image représentant l'article (format accepté : jpg, png) </label>
                <input class="form-control" type="file" name="image_link">
                <label>Contenu</label>
                <textarea class="form-control" type="text" placeholder="contenu" name="contenu"></textarea><br>
                <label> titre</label>
                <input class="form-control" type="text" placeholder="titre" name="titre">
                <label>Votre nom et prénom</label>
                <input class="form-control" type="text" name="nom_prenom_utilisateur" value="<?php echo($adminconnect['nom'].' '.$adminconnect['prenom']) ?>"><br>
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
        </div>
    </body>
    
</html>