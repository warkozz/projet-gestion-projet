<?php
require_once '../controllers/UtilisateurController.php';
require_once '../controllers/DepartementController.php';
$employes = UtilisateurController::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des employés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Liste des employés</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Département</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe): ?>
            <tr>
                <td><?= $employe->id ?></td>
                <td><?= $employe->nom ?></td>
                <td><?= $employe->prenom ?></td>
                <td><?= $employe->email ?></td>
                <td><?= $employe->departement_id ?? 'Non défini' ?></td>
                <td><?= $employe->role ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
