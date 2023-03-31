<?php
session_start();
// var_dump($_SESSION);
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
    <?php
    require_once 'navbar.php';
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>

    <h1>Inscription</h1>
    <form action="create_article.php" method="post">
        <div>
            <label for="">Nom de l'article</label>
            <input type="text" name="nom" id="nom" placeholder="nom">
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" >
        </div>
        <div>
            <label for="quantiter">Quantiter</label>
            <input type="number" name="" id="mdp" placeholder="mot de passe">
        </div>
        <div><input type="submit" value="Enregistrer" name="enregisrer"></div>
    </form>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<p><a href="login.php">Se Connecter</a></p>';
    }
    ?>
</body>

</html>