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
    <link rel="stylesheet" href="style.css">
    <title>Atazone</title>
</head>

<body>
    <div class="message">

        <?php
        require_once 'navbar.php';
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        ?>
    </div>
    <form action="update.php" method="post" class="formulaire">
        <div>
            <label for="">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['user']['nom']; ?>" disabled>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email']; ?>" disabled>
        </div>
        <div>
            <label for="oldmdp">Ancien mot de passe :</label>
            <input type="password" name="oldmdp" id="oldmdp" placeholder="Ancien mot de passe">
        </div>
        <div>
            <label for="newmdp">Nouveau mot de passe :</label>
            <input type="password" name="newmdp" id="newmdp" placeholder="Nouveau mot de passe">
        </div>
        <div>
            <label for="truemdp">Confirmer mot de passe :</label>
            <input type="password" name="truemdp" id="truemdp" placeholder="Confirmer mot de passe">
        </div>
        <div><button>Modifier</button></div>

    </form>
    <?php
    //    if (isset($_SESSION['user'])) {
    //  echo '<p><a href="login.php">Se Connecter</a></p>';
    //}
    ?>

</body>

</html>