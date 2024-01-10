<?php

//fonction permettant de mettre un jeton CSRF en place (affichage du form)
function setCSRF()
{
    //si la session n'existe pas, on la créer
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    //est ce qu'on a deja un jeton CSRF?
    if (empty($_SESSION['token'])) {
        // si non, on créer un jeton
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    //on renvoi le champs caché contenant le jeton generé
    return '<input type="hidden" name="token" value="' . $_SESSION['token'] . '">';
}

// permets de vérifier si le jeton CSRF est bien reçu (traitement du form)
function checkCSRF()
{
    if (!empty($_POST['token'])) {
        if (hash_equals($_SESSION['token'], $_POST['token'])) {
            // Proceed to process the form data
            return true;
        } else {
            // Log this as a warning and keep an eye on these attempts
            return false;
        }
    }
    return false;
}