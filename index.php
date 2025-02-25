<?php
// importation du config.php
require 'config.php';

// Insertion avec requête préparée
// $stmt = $pdo->prepare('INSERT INTO truc (machin) VALUES (?)');
// $stmt->execute([$bidule]);

// Edition et suppression
// edit.php et delete.php
/* <a href="delete.php?id="<?= $produits['id']; ?>>Supprimer</a>
 $id = $_GET['id']; */

/**************************
 AFFICHAGE DES PRODUITS
 *************************/

// Préparation de la requête
$query = "SELECT * FROM produits";

// Exécution de la requête
$stmt = $pdo->query($query);

// Récupération des données (sous forme d'un tableau associatif)
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau produit</title>
</head>
<body>
<?php if(!empty($produits)): ?> <!--Si tableau produits n'est pas vide j'affiche le code suivant-->

    <table>
        <thead>
        <tr>
            <th>ID produits</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        <!--PHP-->
        <?php foreach ($produits as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['id_produits']) ?></td>  <!--?= équivaut à un "echo"-->
                <td><?= htmlspecialchars($a['nom']) ?></td>
                <td><?= htmlspecialchars($a['prix']) ?></td>
                <td><?= htmlspecialchars($a['stock']) ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun produit</p>
<?php endif; ?>
</body>
</html>
