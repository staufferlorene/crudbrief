<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $stock = $_POST['stock'];

    try {
        $stmt = $pdo->prepare('INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)');
        $stmt->execute([$nom, $prix, $stock]);
    } catch (PDOException $e) {
        echo 'error  est survenue ' . $e->getMessage();
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="ajout.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="nom" required>

        <label for="name">Prix :</label>
        <input type="text" id="name" name="prix" required>

        <label for="name">Stock :</label>
        <input type="text" id="name" name="stock" required>
        <button type="submit">Valider</button>
    </form>
</body>
</html>