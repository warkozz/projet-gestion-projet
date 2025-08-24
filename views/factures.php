<?php
require_once '../controllers/FactureController.php';
$factures = FactureController::getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des factures</title>
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
        <span class="fw-bold fs-4">Factures</span>
        <i class="bi bi-person fs-3"></i>
    </div>
    <!-- Main Content -->
    <div class="main-content container-fluid">
        <h2 class="mb-4">Liste des factures</h2>
        <a href="ajout_facture.php" class="btn btn-primary mb-3"><i class="bi bi-file-earmark-plus"></i> Ajouter une facture</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Commande</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Client</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($factures as $facture): ?>
                        <tr>
                            <td><?= htmlspecialchars($facture->id) ?></td>
                            <td><?= htmlspecialchars($facture->commande_id) ?></td>
                            <td><?= htmlspecialchars($facture->date_facture) ?></td>
                            <td><?= htmlspecialchars($facture->total) ?></td>
                            <td><?= htmlspecialchars($facture->client_id ?? '') ?></td>
                            <td>
                                <a href="edit_facture.php?id=<?= $facture->id ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="delete_facture.php?id=<?= $facture->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette facture ?')"><i class="bi bi-trash"></i></a>
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
