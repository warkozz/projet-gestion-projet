<?php
require_once '../controllers/ProjetController.php';
if (!isset($_GET['id'])) {
    header('Location: projets.php');
    exit;
}
$id = $_GET['id'];
$projets = ProjetController::getAll();
$projet = null;
foreach ($projets as $p) {
    if ($p->id == $id) {
        $projet = $p;
        break;
    }
}
if (!$projet) {
    header('Location: projets.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $chef_de_projet_id = $_POST['chef_de_projet_id'];
    ProjetController::update($id, $nom, $description, $date_debut, $date_fin, $chef_de_projet_id);
    header('Location: projets.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <div class="header">
        <span class="fw-bold fs-4">Modifier un projet</span>
        <i class="bi bi-folder2-open fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar d-flex flex-column p-3">
                <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
                    <a class="nav-link active" href="projets.php"><i class="bi bi-folder2-open"></i>Projets</a>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($projet->nom) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($projet->description) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date début</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?= htmlspecialchars($projet->date_debut) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date fin</label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?= htmlspecialchars($projet->date_fin) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="chef_de_projet_id" class="form-label">Chef de projet (ID)</label>
                                <input type="number" class="form-control" id="chef_de_projet_id" name="chef_de_projet_id" value="<?= htmlspecialchars($projet->chef_de_projet_id) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="projets.php" class="btn btn-secondary">Annuler</a>
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
