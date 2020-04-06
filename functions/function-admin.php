<?php 
 function login($pdo, $login, $password){
    try{
        $req = $pdo->prepare('SELECT * FROM utilisateur where login= :login and password= :password'); 
         $req -> execute([
        'login'=> $login,
        'password' => md5($password)
    ]);
    }catch(PDOException $exception){
        var_dump($exception);
        die();
    }
    $res = $req ->fetch();
    if($res == false){
        $errors[] = 'Utilisateur inconnue';
    } else {
        $_SESSION['utlisateur']= $res;
    }
    return $errors;

}
function validateAdminForm() {
    $errors = [];
    if(empty($_POST['login'])){
        $errors[]= 'Veuillez saisir votre login, pseudo pour vous connecter';
    }
    if(empty($_POST['nom'])){
        $errors[]= 'Veuillez saisir votre nom';
    }
    if(empty($_POST['prenom'])){
        $errors[]= 'Veuillez saisir votre prénom';
    }
    if(empty($_POST['password'])){
        $errors[]= 'Veuillez saisir votre pseudo';
    }
    return $errors;
}
function addAdmin($pdo, $errors) {
    try{
        $req = $pdo->prepare('INSERT INTO utilisateur(login, nom, prenom, password) VALUES(:login, :nom, :prenom, :password)'); 
         $req -> execute([
        'login'=>$_POST['login'],
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'password'=> md5($_POST['password'])
    ]);
    }catch(PDOException $exception){
        if($exception-> getCode() === '23000'){
            $errors[] ='Login déjà utilise';
        }

    }
    return $errors;
}
?>