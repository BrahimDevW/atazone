<?php
session_start();

$id = $_POST['id'];

if(
    !is_null($id) 
    // && !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp)
){
    require_once __DIR__ . '/dbCon.php';

    $sql = 'delete from utilisateur where id = :id'; 
    $stmt = $pdo->prepare($sql);

    $mdp = dataCleaning($mdp);

    $res = $stmt->execute([
        'id' => dataCleaning($id),
        
    ]);

    if($res){
        $_SESSION['compte'] = 'Supprimer';
        session_destroy();
    }else{
        $_SESSION['compte'] = 'Erreur administrateur';
    }
}else{
    $_SESSION['compte'] = 'id inexistant';
}

header('location:login.php');
?>
