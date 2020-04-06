<?php
function validateArticleForm() {
        $errors = [];
        $imageUrl = '';
        if($_FILES['image_link']['type'] === 'image_link/png' OR 'image_link/jpg'){
            if($_FILES['image_link']['size'] < 800000 ){
                $extension = explode( '/', $_FILES['image_link']['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($_FILES['image_link']['tmp_name'], 'images/'.$imageUrl);
            } else {
                $errors = 'Fichier trop lourd impossible';
            }
        } else {
            $errors ='Impossible : Je n accepte que les png';
        }
        if(empty($_POST['contenu'])){
            $errors[]= 'Veuillez saisir le contenu de l\'article';
        }
        if(empty($_POST['titre'])){
            $errors[]= 'Veuillez saisir le titre de l\'article';
        }
        if(empty($_POST['nom_prenom_utilisateur'])){
            $errors[]= 'Veuillez saisir votre nom et prénom, il faut bien récuperer votre mérite';
        }
        return ['errors'=>$errors, 'image'=>$imageUrl];
    }
    function addArticle($pdo, $imageUrl){
        $req = $pdo->prepare('INSERT INTO annonce(image_link, contenu, titre , nom_prenom_utilisateur) VALUES(:image, :contenu, :titre, :nom)'); 
        $req -> execute([
            'image'=>$imageUrl,
            'contenu'=>$_POST['contenu'],
            'titre'=>$_POST['titre'],
            'nom'=>$_POST['nom_prenom_utilisateur']
        ]);
    }
?>