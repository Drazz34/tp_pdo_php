<?php

include_once "connexion.php";

$id = $_GET['id'];

$statement = $pdo->prepare("DELETE FROM mes_jeux WHERE id = :id");

if ($statement->execute(['id' => $id])) {
    echo "Le jeu a été supprimé avec succès.";
} else {
    echo "Une erreur s'est produite lors de la suppression du jeu.";
}
?>
<br><br>
<a href="index.php">Retour</a>