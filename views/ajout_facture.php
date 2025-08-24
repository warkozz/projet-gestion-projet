<?php
require_once '../controllers/FactureController.php';
require_once '../controllers/CommandeController.php';
$commandes = CommandeController::getAll();
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
</head>
<body class="container mt-5">
    <h2>Ajouter une facture</h2>
    <form method="post">
        <div class="mb-3">
            <label>Commande</label>
            <select name="commande_id" class="form-control" required>
                <?php foreach ($commandes as $commande): ?>
                <option value="<?= $commande->id ?>"><?= $commande->id ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Date de facture</label>
            <input type="date" name="date_facture" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer la facture</button>
    </form>
</body>
</html>
