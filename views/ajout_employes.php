
<?php
require_once '../controllers/UtilisateurController.php';
require_once '../controllers/DepartementController.php';
$departements = DepartementController::getAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $departement_id = $_POST['departement_id'];
    $role = $_POST['role'];
    UtilisateurController::create($nom, $prenom, $email, $departement_id, $role);
    header('Location: employes.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <!-- Header -->
    <div class="header">
        <span class="fw-bold fs-4">Ajouter un employé</span>
        <i class="bi bi-person fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column p-3">
                <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
                    <a class="nav-link" href="projets.php"><i class="bi bi-folder2-open"></i>Projets</a>
                    <a class="nav-link" href="employes.php"><i class="bi bi-people"></i>Employés</a>
                    <a class="nav-link active" href="clients.php"><i class="bi bi-person-badge"></i>Clients & Commandes</a>
                    <a class="nav-link" href="produits.php"><i class="bi bi-box-seam"></i>Produits & Catégories</a>
                    <a class="nav-link" href="factures.php"><i class="bi bi-receipt"></i>Factures</a>
                    <a class="nav-link mt-2" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i>Déconnexion</a>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h4">Ajouter un employé</h2>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="departement_id" class="form-label">Département</label>
                                <select name="departement_id" id="departement_id" class="form-select" required>
                                    <option value="">Sélectionner...</option>
                                    <?php foreach ($departements as $dep): ?>
                                    <option value="<?= $dep->id ?>"><?= htmlspecialchars($dep->nom) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rôle</label>
                                <select name="role" class="form-select" required>
                                    <option value="">Sélectionner...</option>
                                    <option value="employe">Employé</option>
                                    <option value="chef_de_projet">Chef de projet</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Créer l'employé</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <span class="text-muted">&copy; 2025 Projet de Gestion</span>
    </footer>
</body>
</html>
