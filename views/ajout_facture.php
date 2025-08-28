
<?php
require_once '../controllers/FactureController.php';
require_once '../controllers/CommandeController.php';
$commandes = CommandeController::getAllCommandes();

// Traitement du formulaire d'ajout de facture
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commande_id = $_POST['commande_id'];
    $date_facture = $_POST['date_facture'];
    $total = $_POST['total'];
    FactureController::create($commande_id, $date_facture, $total);
    header('Location: factures.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une facture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/dashboard.css">
</head>
<body class="bg-light">
    <!-- Header -->
    <div class="header">
        <span class="fw-bold fs-4">Ajouter une facture</span>
        <i class="bi bi-person fs-3"></i>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'components/sidebar.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h4">Ajouter une facture</h2>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Commande</label>
                                <select name="commande_id" class="form-select" required>
                                    <?php foreach ($commandes as $commande): ?>
                                    <option value="<?= $commande->id ?>">Commande #<?= $commande->id ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date de facture</label>
                                <input type="date" name="date_facture" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total</label>
                                <input type="number" step="0.01" name="total" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Créer la facture</button>
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
