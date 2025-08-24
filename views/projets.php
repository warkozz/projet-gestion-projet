<?php
require_once '../controllers/ProjetController.php';
$projets = ProjetController::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des projets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Liste des projets</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Chef de projet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projets as $projet): ?>
            <tr>
                <td><?= $projet->id ?></td>
                <td><?= $projet->nom ?></td>
                <td><?= $projet->description ?></td>
                <td><?= $projet->date_debut ?></td>
                <td><?= $projet->date_fin ?></td>
                <td><?= $projet->chef_de_projet_id ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
