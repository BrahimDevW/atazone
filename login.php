<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="titre">
        
        <section>
            <div class="message">
            <?php
            require_once 'navbar.php';
            // est-ce qu'on a un message a afficher
            if (isset($_SESSION['login'])) {
                //Afficher le message de résultat de la création du compte
                echo $_SESSION['login'];
                // j'efface le message de résultat
                unset($_SESSION['login']);
            }
            ?>
            </div>
        </div>
        </section>
    </header>
    <main>
        <form action="authentification.php" method="post" class="origin">
            <div class="formulaire">
                <h3>Accéder à votre compte</h3>

                
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="email" />

                    <label for="mdp">Mot de passe :</label>
                    <input type="password" name="mdp" id="mdp" placeholder="mot de passe" />

                <div><button>Se Connecter</button></div>
            </div>

        </form>
    </main>

</body>

</html>