<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/crud.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">

    <h1>ATAZONE</h1>
        <ul>
            <li>
                <a href="Accueil.php">Accueil</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <li>
                    <a href="moncompte.php">Mon compte
                    </a>
                </li>
                <li>
                    <a href="logout.php">Déconnection</a>
                </li>
        
            <?php
            } else {
            ?>
                <li>
                    <a href="login.php">Se Connecter</a>
                </li>
                <li>
                    <a href="create.php">Créer un compte</a>
                </li>
        
            <?php
            }
        
            ?>
        
        </ul>

    </div>
    
</body>
</html>