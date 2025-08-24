<?php
session_start();
require_once '../controllers/ProjetController.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'chef_de_projet') {
    header('Location: ../auth/login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $chef_de_projet_id = $_SESSION['user_id'];
    ProjetController::create($nom, $description, $date_debut, $date_fin, $chef_de_projet_id);
    header('Location: projets.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Ajouter un projet</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nom du projet</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Date de début</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date de fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer le projet</button>
    </form>
</body>
</html>
