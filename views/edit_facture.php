<?php
require_once '../controllers/FactureController.php';
if (!isset($_GET['id'])) {
    header('Location: factures.php');
    exit;
}
$id = $_GET['id'];
$factures = FactureController::getAll();
$facture = null;
foreach ($factures as $f) {
    if ($f->id == $id) {
        $facture = $f;
        break;
    }
}
if (!$facture) {
    header('Location: factures.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commande_id = $_POST['commande_id'];
    $date_facture = $_POST['date_facture'];
    $total = $_POST['total'];
    FactureController::update($id, $commande_id, $date_facture, $total);
    header('Location: factures.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une facture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <div class="header">
        <span class="fw-bold fs-4">Modifier une facture</span>
        <i class="bi bi-receipt fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar d-flex flex-column p-3">
                <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
                    <a class="nav-link active" href="factures.php"><i class="bi bi-receipt"></i>Factures</a>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="commande_id" class="form-label">Commande ID</label>
                                <input type="number" class="form-control" id="commande_id" name="commande_id" value="<?= htmlspecialchars($facture->commande_id) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="date_facture" class="form-label">Date facture</label>
                                <input type="date" class="form-control" id="date_facture" name="date_facture" value="<?= htmlspecialchars($facture->date_facture) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="number" step="0.01" class="form-control" id="total" name="total" value="<?= htmlspecialchars($facture->total) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="factures.php" class="btn btn-secondary">Annuler</a>
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
