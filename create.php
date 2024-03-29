<?php
session_start();
require_once __DIR__ . '/csrf.php';

function verifyReCaptcha($recaptchaCode)
{
    $postdata = http_build_query([
        "secret" => "6LfsQ1olAAAAALdwc_J2CzYY1P7CgX6SukmIITj-",
        "response" => $recaptchaCode
    ]);
    $opts = [
        'http' =>
        [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        ]
    ];
    $context  = stream_context_create($opts);
    $result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $check = json_decode($result);
    return $check->success;
}

$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$adresse = $_POST['adresse'] ?? null;
$code_postal = $_POST['code_postal'] ?? null;
$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp']; // P@ssw0rd
$truemdp = $_POST['truemdp'];

if (
    !is_null($nom) && strlen($nom) <= 100 &&
    !is_null($prenom) && strlen($prenom) <= 100 &&
    !is_null($adresse) && strlen($adresse) <= 320 &&
    !is_null($code_postal) && strlen($code_postal) <= 50 &&
    !is_null($email) && strlen($email) <= 255 &&
    //le mdp doit faire au mins 8 caractere de long, contenir au moins, une minuscule, une majuscule, un chiffre et un caractere soécial
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp) &&
    $mdp === $truemdp
    && verifyReCaptcha($_POST['g-recaptcha-response'])

) {
    require_once __DIR__ . '/dbCon.php';

    $sql = 'insert into utilisateur values(null, :nom,:prenom,:adresse,:code_postal, :email, :mdp);';
    $stmt = $pdo->prepare($sql);

    $mdp = dataCleaning($mdp);

    $res = $stmt->execute([
        'nom' => dataCleaning($nom),
        'prenom' => dataCleaning($prenom),
        'adresse' => dataCleaning($adresse),
        'code_postal' => dataCleaning($code_postal),
        'email' => dataCleaning($email),
        'mdp' => password_hash($mdp, PASSWORD_ARGON2I)
        
    ]);

    if ($res) {
        $_SESSION['login'] = 'Inscription réussi';
        header('location:login.php');

        die();
    } else {
        $_SESSION['login'] = 'Erreur administrateur';
    }
} else {
    $_SESSION['login'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}
header('location:form_create.php');



