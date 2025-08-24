<?php
require_once '../controllers/CategorieController.php';
if (!isset($_GET['id'])) {
    header('Location: categories.php');
    exit;
}
$id = $_GET['id'];
$categories = CategorieController::getAll();
$categorie = null;
foreach ($categories as $cat) {
    if ($cat->id == $id) {
        $categorie = $cat;
        break;
    }
}
if (!$categorie) {
    header('Location: categories.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    // Méthode update à ajouter dans le controller
    CategorieController::update($id, $nom);
    header('Location: categories.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <div class="header">
        <span class="fw-bold fs-4">Modifier une catégorie</span>
        <i class="bi bi-tags fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar d-flex flex-column p-3">
                <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
                    <a class="nav-link" href="projets.php"><i class="bi bi-folder2-open"></i>Projets</a>
                    <a class="nav-link" href="employes.php"><i class="bi bi-people"></i>Employés</a>
                    <a class="nav-link" href="clients.php"><i class="bi bi-person-badge"></i>Clients & Commandes</a>
                    <a class="nav-link" href="produits.php"><i class="bi bi-box-seam"></i>Produits & Catégories</a>
                    <a class="nav-link" href="factures.php"><i class="bi bi-receipt"></i>Factures</a>
                    <a class="nav-link active" href="categories.php"><i class="bi bi-tags"></i>Catégories</a>
                    <a class="nav-link mt-2" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i>Déconnexion</a>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h4">Modifier une catégorie</h2>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($categorie->nom) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <a href="categories.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <footer class="footer">
        <span class="text-muted">&copy; 2025 Projet de Gestion</span>
    </footer>
</body>
</html>
