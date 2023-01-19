<a href="byConsole.php">Tous les jeux</a>
<a href="byConsole.php?console=ps4">Tous les jeux PS4</a>
<a href="byConsole.php?console=switch">Tous les jeux Switch</a>
<a href="byConsole.php?console=xbox serie">Tous les jeux Xbox</a>
<br><br>

<?php

include_once "connexion.php";

// Vérifie si le paramètre "console" est présent dans l'URL
if (isset($_GET['console'])) {
    $console = $_GET['console'];

    // Requête pour récupérer tous les jeux de la console spécifiée
    $stmt = $pdo->prepare("SELECT * FROM mes_jeux WHERE console = ? ORDER BY nom ASC");
    $stmt->execute([$console]);
} else {
    // Requête pour récupérer tous les jeux de toutes les consoles
    $stmt = $pdo->prepare("SELECT * FROM mes_jeux ORDER BY nom ASC");
    $stmt->execute();
}

// Récupération des résultats sous forme de tableau associatif
$nom_console = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des jeux
foreach ($nom_console as $value) {
    echo $value['nom'] . "<br>";
}


