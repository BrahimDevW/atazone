<?php
session_start();

//$id = $_POST['id'];
$nom = $_POST['nom'] ?? null;
$email = $_POST['email'] ?? null;
$newmdp = $_POST['newmdp'];
$truemdp = $_POST['truemdp'];
$oldmdp = $_POST['oldmdp'];

if (
    !is_null($nom) && strlen($nom) <= 100 &&
    !is_null($email) && strlen($email) <= 255 &&
    !is_null($newmdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $newmdp) &&
    !is_null($oldmdp) &&
    $newmdp === $truemdp
) {
    require_once __DIR__ . '/dbCon.php';

    $sql = 'select * from utilisateur where email = :email';

    //je prepare ma requete pour eviter les attaques par type injection SQL
    $stmt = $pdo->prepare($sql);

    //j'execute la requête en fournissant les données du formulaire
    $res = $stmt->execute(['email' => dataCleaning($email)]);

    //informe l'utilisateur que l'insertion est ok
    if ($res) {
        //je vais recuperer les informations de l'utilisateur et
        $user = $stmt->fetch(); // ->fetch permet de lire une ligne du resultat SQL
var_dump($oldmdp, $user['mdp']);
        // je compare le mdp fourni avec celui stocké en bdd
        if (password_verify($oldmdp, $user['mdp']) === true) {
            //si le mdp est vérifié alors j
            $sql = 'update utilisateur set nom= :nom, email= :email, mdp=:newmdp where email = :email;';
            $stmt = $pdo->prepare($sql);

            $res = $stmt->execute([
                'nom' => dataCleaning($nom),
                'email' => dataCleaning($email),
                //'id' => $_SESSION['user']['id'],
                'newmdp' => password_hash($newmdp, PASSWORD_ARGON2I)
            ]);
            $_SESSION ['user']['nom'] = $nom;
            $_SESSION ['user']['email'] = $email;
            //$_SESSION ['user']['id'] = $id;
            $_SESSION ['user']['newmdp'] = $newmdp;

            if ($res) {
                $_SESSION['login'] = 'Modifier avec succes';
                header('location:login.php');

            } else {
                $_SESSION['login'] = 'Erreur administrateur';
            }
        } else {
            $_SESSION['login'] = 'Veuillez vérifier les informations saisie sur le formulaire';
        }
        //$_SESSION['user'] = $user; // j'enregistre le comtpe utilisateur en session
        //je redirige vers la homepage

        //j'arrete l'execution du script
        //die(); // ou exit();

        //si mdp vide
    }
}
var_dump($_SESSION);
//header('location:form-update.php');
