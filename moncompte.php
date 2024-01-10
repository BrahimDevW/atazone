<?php
session_start();
// si mon user n'est pas connecté
// if (!isset($_SESSION['user'])) {
//     $_SESSION['login']='Vous devez être identifié pour accéder a cette page';
//     // je le redirige vers le formulaire de login
//     header('location:login.php');
// }
// echo '<pre>' . print_r($_SESSION, true) . '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
    <div class="titre">
        <?php
        require_once 'navbar.php';
        if (isset($_SESSION['compte'])) {
            echo $_SESSION['compte'];
            unset($_SESSION['compte']);
        }
        ?>
    </div>
    </header>
    <main>
        <?php
        if (isset($_SESSION['user'])) {

            $nom = $_SESSION['user']['nom'];
            $prenom = $_SESSION['user']['prenom'];
            $adresse = $_SESSION['user']['adresse'];
            $code_postal = $_SESSION['user']['code_postal'];
            echo '<p> ' . $nom .' '. $prenom .'</p>
                  <p style="font-weight:bold">Adresse de livraison:</p>
                  <p> ' . $nom .'</p>
                  <p> ' . $prenom .'</p>
                  <p> ' . $adresse .'</p>
                  <p> ' . $code_postal .'</p>
                  



                 <form action="delete.php" method="post">
                 <input type="hidden" name="id" value="' . $_SESSION['user']['id'] . '">
                 <input type="submit" name="btn" value="Supprimer mon compte" style="border-radius: 3px ; padding:5px"></input>
                </form>';
        }
        echo ' 
        <form action="form_update.php" method="post">
            <input type="hidden" name="id" value="' . $_SESSION['user']['id'] . '">
            <input type="submit" name="btn" value="modifier mot de passe" style="border-radius: 3px ; padding:5px ; margin-top: 5px;"></input>
        </form>'
        ?>


    </main>
</body>

</html>