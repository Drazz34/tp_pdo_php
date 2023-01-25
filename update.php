<?php

include_once "connexion.php";

// Récupération des données du formulaire
$nom = filter_input(INPUT_POST, "nom");
$console = filter_input(INPUT_POST, "console");

$id = filter_input(INPUT_GET, "id");

// Préparation et exécution de la requête d'insertion
$statement = $pdo -> prepare("UPDATE `mes_jeux` SET `nom`= :nom, `console`= :console WHERE id= :id");
$statement->bindParam(":nom", $nom);
$statement->bindParam(":console", $console);
$statement->bindParam(":id", $id);
$statement -> execute();

echo "Votre jeu $nom et / ou la console $console ont bien été modifiés.";

?>

<br>

<a href="index.php">Retour</a>