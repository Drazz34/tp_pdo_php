<?php

include 'connexion.php';

$id = filter_input(INPUT_GET, 'id');
$statement = $pdo->prepare("SELECT * FROM `mes_jeux` WHERE id = :id");

$statement -> execute(['id' => $id]);

// Récupère le résultat
$result = $statement->fetch(PDO::FETCH_ASSOC);

$nom = $result['nom'];
$console = $result['console'];

?>

<h1>Modification d un ancien jeu</h1>

<form action="update.php?id=<?= $id ?>" method="post">

    <label for="nom">Nom : </label>
    <input type="text" name="nom" value="<?= $nom ?>">

    <br>

    <label for="console">Nom de la console : </label>
    <input type="text" name="console" value = "<?= $console ?>">

    <br>

    <input type="submit" value="ok">

</form>

<a href="index.php">Retour</a>