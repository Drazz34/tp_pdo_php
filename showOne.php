<?php

include_once "connexion.php";

// Récupération du paramètre GET

if(isset($_GET['id']))
{
$id = filter_input(INPUT_GET, "id");
$statement = $pdo->prepare("SELECT * FROM `mes_jeux` WHERE id = :id");
$statement->bindParam(":id", $id);
$statement->execute();

// Récupère le résultat

$result = $statement->fetch(PDO::FETCH_ASSOC);

// Affichage

echo 'Mon jeu numéro : '. $result['id'];
echo '<br>';
echo 'Nom : ' . $result['nom'];
echo '<br>';
echo 'Sur console : '. $result['console'];
}
else
{
    echo "Aucun jeu spécifié";
}

?>

<br>

<a href="index.php">Retour</a>

<br>

<a href="form_update.php?id=<?= $id ?>">Modifier ce jeu</a>
