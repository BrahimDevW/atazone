<?php
session_start();

$nom = $_POST['nom'] ?? null;
$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'];
$truemdp = $_POST['truemdp'];

if(
    !is_null($nom) && strlen($nom) <= 100 &&
    !is_null($email) && strlen($email) <= 255 && 
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp) &&
    $mdp === $truemdp
){
    require_once __DIR__ . '/dbCon.php';

    //si mdp vide
        $sql = 'update utilisateur set nom= :nom, email= :email, mdp=:mdp where id = :id;'; 
        $stmt = $pdo->prepare($sql);
    
        $mdp = dataCleaning($mdp);
    
        $res = $stmt->execute([
            'nom' => dataCleaning($nom),
            'email' => dataCleaning($email),
            'id' => $_SESSION ['user']['id'],
            'mdp' => password_hash($mdp, PASSWORD_ARGON2I)
        ]);

    if($res){
        $_SESSION['login'] = 'Modifier avec succes';
    }else{
        $_SESSION['login'] = 'Erreur administrateur';
    }
}else{
    $_SESSION['login'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}

header('location:login.php');
?>