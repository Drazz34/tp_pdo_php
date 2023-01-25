<?php

// Instancie la classe Connexion
include_once "connexion.php";

// Utilise la méthode query afin de récupérer un PDOStatement
$statement = $pdo->query("SELECT * FROM `mes_jeux`");

// Récupère le résultat
// $result = $statement->fetch();

// Observons le résultat
// var_dump($result);

// array (size=6)
//   'id' => int 1
//   0 => int 1
//   'nom' => string 'Mario Kart' (length=10)
//   1 => string 'Mario Kart' (length=10)
//   'console' => string 'switch' (length=6)
//   2 => string 'switch' (length=6)

// Pour récupérer le nom
// $nom = $result[1];
// ou
// $nom = $result['nom'];

// $result = $statement->fetch(PDO::FETCH_ASSOC);

// var_dump($result);

//  Quel mode permet d’obtenir un objet ? Quelle est la classe de cet objet ?
// PDO::FETCH_OBJ. C'est un objet anonyme, il n'a pas de nom de classe défini et est créé à la volée lors de l'exécution du code.

//  Essayez d’exécuter le même code avec la méthode fetchAll();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

// - Que se passe-t-il ?

// array (size=4)
//   0 => 
//     array (size=3)
//       'id' => int 1
//       'nom' => string 'Mario Kart' (length=10)
//       'console' => string 'switch' (length=6)
//   1 => 
//     array (size=3)
//       'id' => int 2
//       'nom' => string 'Halo' (length=4)
//       'console' => string 'xbox serie' (length=10)
//   2 => 
//     array (size=3)
//       'id' => int 3
//       'nom' => string 'Horizon Forbidden West' (length=22)
//       'console' => string 'ps4' (length=3)
//   3 => 
//     array (size=3)
//       'id' => int 4
//       'nom' => string 'Forza Horizon 5' (length=15)
//       'console' => string 'xbox serie' (length=10)

// - Quel est le type de $result dans ce cas
// echo gettype($result);
// C'est un tableau associatif.

// - Quelle méthode est la plus adaptée à la requête, pourquoi ?
// fecthAll() est plus adaptée car elle retourne tous les résultats en une seule fois, sous forme de tableau.
// fetchAll() est plus adapté pour des requêtes qui retournent peu de données.

// echo "<pre>";
// echo print_r($result);
// echo "<pre>";

// echo "Ma liste de jeux vidéos : <br>";
// foreach ($result as $value) {
//     echo "- " . $value['nom'] . " sur la console " . $value['console'] . ".<br>";
// }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>

<a href="form_insert.php">Ajouter un nouveau jeu.</a>
<br>
<a href="byConsole.php">Voir les jeux par console.</a>

<br><br>

<?php 
echo "Ma liste de jeux vidéos : <br><br>";
foreach ($result as $value) {
    echo "- " . $value['nom_jeu'] . " sur la console " . $value['console_id'] . ".<br>";
    echo '<a href="showOne.php?id=' . $value['id'] . '">Voir ce jeu en détail</a><br><br>';
}

foreach ($result as $row) {
    ?>
    <p><?= $row['nom_jeu'] ?> -
    <a href="delete.php?id=<?= $row['id'] ?>">Supprimer</a>
    </p>
    <?php
    }
?>

    

</body>

</html>