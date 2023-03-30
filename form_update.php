<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'navbar.php';
    if (isset($_SESSION['compte'])) {
        echo $_SESSION['compte'];
        unset($_SESSION['compte']);
    }

    ?>
    <form action="update.php" method="post">
        <div>
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['user']['nom']; ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email']; ?>">
        </div>
        <div>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" placeholder="mot de passe">
        </div>
        <div>
            <label for="mdp">Confirmer mot de passe</label>
            <input type="password" name="truemdp" id="mdp" placeholder="confirmer mot de passe">
        </div>
        <div><input type="submit" value="Modifier" name="modifier"></div>

    </form>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<p><a href="login.php">Se Connecter</a></p>';
    }
    ?>

</body>

</html>