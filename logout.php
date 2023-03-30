<?php 
//je recupere la session courante
session_start();

//je la détruit
session_destroy();

//je redirige vers la page de mon choix
header('location:login.php');