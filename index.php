<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Gestion de Projets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Bienvenue sur le système de gestion de projets</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Connecté en tant que <strong><?= $_SESSION['role'] ?></strong></p>
        <a href="auth/logout.php" class="btn btn-danger">Déconnexion</a>
        <hr>
        <a href="views/projets.php" class="btn btn-primary">Projets</a>
        <a href="views/clients.php" class="btn btn-primary">Clients</a>
        <a href="views/login.php" class="btn btn-secondary">Connexion</a>
        <a href="views/register.php" class="btn btn-secondary">Inscription</a>
    <?php else: ?>
        <a href="views/login.php" class="btn btn-primary">Connexion</a>
        <a href="views/register.php" class="btn btn-success">Inscription</a>
    <?php endif; ?>
</body>
</html>
