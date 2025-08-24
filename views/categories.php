<?php
require_once '../controllers/CategorieController.php';
$categories = CategorieController::getAll();
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
