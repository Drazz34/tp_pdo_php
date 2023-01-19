<?php

include_once "connexion.php";

// Récupération des données du formulaire
// $nom = $_POST['nom'];
// $console = $_POST['console'];

// Préparation et exécution de la requête d'insertion
$statement = $pdo -> prepare("UPDATE `mes_jeux` SET `nom`='Mario', `console`='ps4' WHERE id=1");

$statement -> execute();

// echo "Votre jeu $nom et / ou la console $console ont bien été modifiés.";