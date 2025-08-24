<?php
require_once '../controllers/CommandeController.php';
require_once '../controllers/ClientController.php';
$clients = ClientController::getAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $date_commande = $_POST['date_commande'];
    CommandeController::create($client_id, $date_commande);
    header('Location: commandes.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Ajouter une commande</h2>
    <form method="post">
        <div class="mb-3">
            <label>Client</label>
            <select name="client_id" class="form-control" required>
                <?php foreach ($clients as $client): ?>
                <option value="<?= $client->id ?>"><?= $client->nom ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Date de commande</label>
            <input type="date" name="date_commande" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer la commande</button>
    </form>
</body>
</html>
