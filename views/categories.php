<?php
require_once '../controllers/CategorieController.php';
require_once '../controllers/ProduitController.php';
require_once '../models/ProduitCategorie.php';
$categories = CategorieController::getAll();
$produits = ProduitController::getAll();

// Récupérer les produits associés à chaque catégorie
global $pdo;
$categorieProduits = [];
$stmt = $pdo->query('SELECT * FROM Produit_Categorie');
while ($row = $stmt->fetch()) {
    $categorieProduits[$row['categorie_id']][] = $row['produit_id'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">

</head>
<body class="bg-light">
    <!-- Sidebar -->
    <?php include 'components/sidebar.php'; ?>
    <!-- Header -->
    <div class="header">
        <span class="fw-bold fs-4">Catégories</span>
        <i class="bi bi-tags fs-3"></i>
    </div>
    <!-- Main Content -->
    <div class="main-content container-fluid">
        <h2 class="mb-4">Liste des catégories</h2>
        <a href="ajout_categorie.php" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Ajouter une catégorie</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie): ?>
                        <tr>
                            <td><?= htmlspecialchars($categorie->id) ?></td>
                            <td><?= htmlspecialchars($categorie->nom) ?></td>
                            <td>
                                <?php 
                                    if (isset($categorieProduits[$categorie->id])) {
                                        foreach ($categorieProduits[$categorie->id] as $prodId) {
                                            foreach ($produits as $prod) {
                                                if ($prod->id == $prodId) {
                                                    echo '<span class="badge bg-success me-1">'.htmlspecialchars($prod->nom).'</span>';
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<span class="text-muted">Aucun produit</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="edit_categorie.php?id=<?= $categorie->id ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_categorie.php?id=<?= $categorie->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette catégorie ?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <span class="text-muted">&copy; 2025 Projet de Gestion</span>
    </footer>
</body>
</html>
