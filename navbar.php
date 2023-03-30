<ul>
    <li>
        <a href="Accueil.php">Accueil</a>
    </li>
    <?php
    if (isset($_SESSION['user'])) {
    ?>
        <li>
            <a href="moncompte.php">Mon compte</a>
        </li>
        <li>
            <a href="logout.php">Logout</a>
        </li>

    <?php
    } else {
    ?>
        <li>
            <a href="login.php">Login</a>
        </li>
        <li>
            <a href="create.php">créer un compte</a>
        </li>

    <?php
    }

    ?>

</ul>