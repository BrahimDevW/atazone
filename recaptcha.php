<?php
//fonction check verify
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

//recup data formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$code_postal = $_POST['code_postal'] ?? '';
$email = $_POST['email'] ??
$mdp = $_POST['mdp'] ?? '';
$truemdp = $_POST['truemdp'];


$tabCivilite = ['mr', 'mme', 'autre'];

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
    echo 'ok!';
} else {
    echo 'ko!';
}