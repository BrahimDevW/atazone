<?php
session_start();
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
    <h1>Site de vetement</h1>
    <?php

    require_once 'navbar.php';

    if (isset($_SESSION['user'])) {
        echo "Bienvenue {$_SESSION['user']['nom']}";
    }
    ?>

</body>

</html>