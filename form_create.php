<?php
session_start();
// var_dump($_SESSION);
require_once __DIR__ . '/csrf.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/crud.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Document</title>
</head>

<body>
    <h1>Inscription</h1>
    <div class="message">

        <?php

        require_once 'navbar.php';

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
    </div>

    <form action="create.php" method="post">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" placeholder="89 rue de l'exemple ">
        </div>
        <div>
            <label for="code_postal">Code Postal</label>
            <input type="text" name="code_postal" id="code_postal" placeholder="59XXX">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email">
        </div>
        <div>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" placeholder="mot de passe">
        </div>
        <div>
            <label for="mdp">Confirmer mot de passe</label> <br>
            <input type="password" name="truemdp" id="mdp" placeholder="confirmer mot de passe">
        </div>
        <div class="g-recaptcha" data-sitekey="6LfsQ1olAAAAANsCGDwP0PKR_IqKA6cTxwNYfaY4"></div>
        <?php echo setCSRF(); ?>
        <div><input type="submit" value="Enregistrer" name="enregisrer"></div>

    </form>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<p><a href="login.php">Se Connecter</a></p>';
    }
    ?>
</body>

</html>