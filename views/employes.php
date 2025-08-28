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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            background: #fff;
            border-right: 1px solid #e5e7eb;
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }
        .sidebar .nav-link {
            color: #222;
            font-weight: 500;
            border-radius: 8px;
            margin-bottom: 4px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #2563eb;
            color: #fff;
        }
        .sidebar .bi {
            font-size: 1.2rem;
            margin-right: 8px;
        }
        .header {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: fixed;
            top: 0; left: 240px;
            right: 0;
            z-index: 101;
        }
        .main-content {
            margin-left: 240px;
            margin-top: 80px;
        }
        .footer {
            background: #fff;
            border-top: 1px solid #e5e7eb;
            position: fixed;
            left: 240px;
            right: 0;
            bottom: 0;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 991px) {
            .sidebar { position: static; width: 100%; min-height: auto; border-right: none; }
            .header { left: 0; }
            .main-content { margin-left: 0; margin-top: 80px; }
            .footer { left: 0; }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include 'components/sidebar.php'; ?>
    <!-- Header -->
    <div class="header">
        <span class="fw-bold fs-4">Employés</span>
        <i class="bi bi-person fs-3"></i>
    </div>
    <!-- Main Content -->
    <div class="main-content container-fluid">
        <h2 class="mb-4">Liste des employés</h2>
        <a href="ajout_employes.php" class="btn btn-primary mb-3"><i class="bi bi-person-plus"></i> Ajouter un employé</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
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
                        <?php
                        require_once '../controllers/DepartementController.php';
                        $departements = DepartementController::getAll();
                        foreach ($employes as $employe): ?>
                        <tr>
                            <td><?= htmlspecialchars($employe->id) ?></td>
                            <td><?= htmlspecialchars($employe->nom) ?></td>
                            <td><?= htmlspecialchars($employe->prenom) ?></td>
                            <td><?= htmlspecialchars($employe->email) ?></td>
                            <td>
                                <?php
                                $depNom = 'Non défini';
                                foreach ($departements as $dep) {
                                    if ($dep->id == $employe->departement_id) {
                                        $depNom = $dep->nom;
                                        break;
                                    }
                                }
                                echo $depNom;
                                ?>
                            </td>
                            <td><?= htmlspecialchars($employe->role) ?></td>
                            <td>
                                <a href="edit_employe.php?id=<?= $employe->id ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_employe.php?id=<?= $employe->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet employé ?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <span class="text-muted">&copy; 2025 Projet de Gestion</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
