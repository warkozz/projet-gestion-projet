<?php
require_once '../controllers/UtilisateurController.php';
require_once '../controllers/DepartementController.php';
if (!isset($_GET['id'])) {
    header('Location: employes.php');
    exit;
}
$id = $_GET['id'];
$employes = UtilisateurController::getAll();
$employe = null;
foreach ($employes as $e) {
    if ($e->id == $id) {
        $employe = $e;
        break;
    }
}
if (!$employe) {
    header('Location: employes.php');
    exit;
}
$departements = DepartementController::getAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $departement_id = $_POST['departement_id'];
    $mot_de_passe = $employe->mot_de_passe;
    UtilisateurController::update($id, $nom, $prenom, $email, $mot_de_passe, $role, $departement_id);
    header('Location: employes.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <div class="header">
        <span class="fw-bold fs-4">Modifier un employé</span>
        <i class="bi bi-people fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar d-flex flex-column p-3">
                <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
                    <a class="nav-link active" href="employes.php"><i class="bi bi-people"></i>Employés</a>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($employe->nom) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($employe->prenom) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($employe->email) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="employe" <?= $employe->role == 'employe' ? 'selected' : '' ?>>Employé</option>
                                    <option value="chef_de_projet" <?= $employe->role == 'chef_de_projet' ? 'selected' : '' ?>>Chef de projet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="departement_id" class="form-label">Département</label>
                                <select class="form-select" id="departement_id" name="departement_id" required>
                                    <?php foreach ($departements as $dep): ?>
                                        <option value="<?= $dep->id ?>" <?= $employe->departement_id == $dep->id ? 'selected' : '' ?>><?= htmlspecialchars($dep->nom) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="employes.php" class="btn btn-secondary">Annuler</a>
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
