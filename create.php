<?php
session_start();

$nom = $_POST['nom'] ?? null;
$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp']; // P@ssw0rd
$truemdp = $_POST['truemdp'];

if (
    !is_null($nom) && strlen($nom) <= 100 &&
    
    !is_null($email) && strlen($email) <= 255 &&
    //le mdp doit faire au mins 8 caractere de long, contenir au moins, une minuscule, une majuscule, un chiffre et un caractere soécial
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp) &&
    $mdp === $truemdp
) {
    require_once __DIR__ . '/dbCon.php';

    $sql = 'insert into utilisateur (id,nom,email,mdp) values(null, :nom, :email, :mdp);';
    $stmt = $pdo->prepare($sql);

    $mdp = dataCleaning($mdp);

    $res = $stmt->execute([
        'nom' => dataCleaning($nom),
        'email' => dataCleaning($email),
        'mdp' => password_hash($mdp, PASSWORD_ARGON2I)
        
    ]);

    if ($res) {
        $_SESSION['login'] = 'Inscription réussi';
        header('location:login.php');
        die();
    } else {
        $_SESSION['login'] = 'Erreur administrateur';
    }
} else {
    $_SESSION['login'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}
header('location:form_create.php');



