<?php
//Active le mode erreur de PHP
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// try : permet d'essayer d'executer un code
// catch (\Exception $e) => permet de personaliser le message d'erreur
// finally : permet d'executer un code qu'il ai erreur ou non

try {
    // caracteristique de la connexion
    $dsn = 'mysql:dbname=demophp;host=localhost;port=3306;charset=utf8';

    //info de connexion
    $user = 'root';
    $pwd = '';

    //créer la connexion a la bdd
    $pdo = new PDO($dsn, $user, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // permet d'activer le mode verbeux pour les erreurs de la base de données
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    // lire les enregistrements comme un tableau
    ]);
} catch (PDOException $e) {
    // die permet d'empecher l'exection du code suivant
    // die("Error : une erreur est survenue lors de l'exection de la requête");
    echo ("Error : une erreur est survenue lors de l'execution de la requête");
} 
// finally {
//     echo "<hr>executer quoi qu'il arrive<hr>";
// }

function dataCleaning($data)
{
    $data = trim($data);    // retire les espaces inutiles en début et en fin de chaine
    $data = stripslashes($data);    // securise les \ et les ' en les prefixants avec \
    $data = htmlentities($data);    // convertit tout les caractères éligible en entité HTML (exemple <script> devient &lt;script&gt;)
    return $data;
}