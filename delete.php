<?php

// Importation de la configuration et lancement de la session
require 'config.php';
session_start();

// Récupération de l'id du produit
$id = ($_GET['id']);

// Supprimer en bdd toutes les lignes se rapportant à l'id du produit sélectionné
try{
    $sql="DELETE FROM produits WHERE id_produits=?";
    $req=$pdo->prepare($sql);
    $retour=$req->execute([$id]);

    // Si ok afficher message succès sinon un message KO
    if($retour){
        echo 'Produit supprimé';
    }
}catch(PDOException $e){
    echo 'error  est survenue '.$e->getMessage();
}

//Redirection sur la page index après ajout du produit
header("Location: index.php");
exit();
?>