<?php
require_once '../controllers/CategorieController.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    CategorieController::create($nom);
    header('Location: categories.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Menu principal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="projetsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Projets</a>
                        <ul class="dropdown-menu" aria-labelledby="projetsDropdown">
                            <li><a class="dropdown-item" href="ajout_projet.php">Ajouter un projet</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clientsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
                        <ul class="dropdown-menu" aria-labelledby="clientsDropdown">
                            <li><a class="dropdown-item" href="ajout_client.php">Ajouter un client</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="produitsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                        <ul class="dropdown-menu" aria-labelledby="produitsDropdown">
                            <li><a class="dropdown-item" href="ajout_produit.php">Ajouter un produit</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item active" href="ajout_categorie.php">Ajouter une catégorie</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="commandesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Commandes</a>
                        <ul class="dropdown-menu" aria-labelledby="commandesDropdown">
                            <li><a class="dropdown-item" href="ajout_commande.php">Ajouter une commande</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="facturesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Factures</a>
                        <ul class="dropdown-menu" aria-labelledby="facturesDropdown">
                            <li><a class="dropdown-item" href="ajout_facture.php">Ajouter une facture</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Ajouter une catégorie</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer la catégorie</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
