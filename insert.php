<?php

include_once "connexion.php";

// $nom = 'Skyrim';
// $console = 'ps4';

// $sql = "INSERT INTO `mes_jeux` ( `nom`, `console` )
// VALUES ('". $nom . "', '". $console . "' );";

// // echo $sql . "<br>";
// $statement = $pdo->query($sql);

// ou alors 

// Mes variables récupérer en GET ou POST
// $nom = 'GTA 5';
// $console = 'ps4';
// // Préparation
// $statement = $pdo->prepare(
// "INSERT INTO `mes_jeux`(nom, console)
// VALUES (:n, :c);");
// // Correspondre les valeurs
// $statement->bindParam(':n', $nom, PDO::PARAM_STR);
// $statement->bindParam(':c', $console, PDO::PARAM_STR);
// $result = $statement->execute();
// var_dump($result);

// echo $pdo->lastInsertId();

// Récupération des données du formulaire
$nom = $_POST['nom'];
$console = $_POST['console'];

// Préparation et exécution de la requête d'insertion
$stmt = $pdo->prepare("INSERT INTO mes_jeux (nom, console) VALUES (?, ?)");
$stmt->execute([$nom, $console]);

// Récupération de l'ID du dernier enregistrement inséré
$lastInsertId = $pdo->lastInsertId();

// Affichage d'un message de succès
echo "Le jeu n°" . $lastInsertId . " a été créé avec succès<br><br>";
echo "<a href='form_insert.php'>Retour</a>";
?>