<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
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
        .card-dashboard {
            border-radius: 16px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 140px;
        }
        .card-dashboard .bi {
            font-size: 2.5rem;
            margin-bottom: 8px;
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
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="mb-4 d-flex align-items-center"><i class="bi bi-kanban me-2"></i>Projet de Gestion</h4>
        <nav class="nav flex-column">
            <a class="nav-link active" href="dashboard.php"><i class="bi bi-grid-1x2-fill"></i>Tableau de bord</a>
            <a class="nav-link" href="views/projets.php"><i class="bi bi-folder2-open"></i>Projets</a>
            <a class="nav-link" href="views/employes.php"><i class="bi bi-people"></i>Employés</a>
            <a class="nav-link" href="views/clients.php"><i class="bi bi-person-badge"></i>Clients & Commandes</a>
            <a class="nav-link" href="views/produits.php"><i class="bi bi-box-seam"></i>Produits & Catégories</a>
            <a class="nav-link" href="views/factures.php"><i class="bi bi-receipt"></i>Factures</a>
            <a class="nav-link mt-2" href="auth/logout.php"><i class="bi bi-box-arrow-right"></i>Déconnexion</a>
        </nav>
    </div>
    <!-- Header -->
    <div class="header">
        <span class="fw-bold fs-4">Tableau de bord</span>
        <i class="bi bi-person fs-3"></i>
    </div>
    <!-- Main Content -->
    <div class="main-content container-fluid">
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <a href="views/projets.php" class="text-decoration-none">
                <div class="card card-dashboard bg-primary shadow-sm">
                    <i class="bi bi-folder2-open"></i>
                    <div class="fs-2">8</div>
                    <div class="fw-bold">Projets actifs</div>
                </div>
                </a>
                <a href="views/ajout_projet.php" class="btn btn-outline-primary w-100 mt-2"><i class="bi bi-plus-square"></i> Ajouter un projet</a>
            </div>
            <div class="col-md-3">
                <a href="views/employes.php" class="text-decoration-none">
                <div class="card card-dashboard bg-success shadow-sm">
                    <i class="bi bi-people"></i>
                    <div class="fs-2">12</div>
                    <div class="fw-bold">Employés</div>
                </div>
                </a>
                <a href="views/ajout_employes.php" class="btn btn-outline-success w-100 mt-2"><i class="bi bi-person-plus"></i> Ajouter un employé</a>
            </div>
            <div class="col-md-3">
                <a href="views/clients.php" class="text-decoration-none">
                <div class="card card-dashboard bg-warning shadow-sm">
                    <i class="bi bi-cart"></i>
                    <div class="fs-2">5</div>
                    <div class="fw-bold">Clients</div>
                </div>
                </a>
                <a href="views/ajout_client.php" class="btn btn-outline-warning w-100 mt-2"><i class="bi bi-person-plus"></i> Ajouter un client</a>
            </div>
            <div class="col-md-3">
                <a href="views/factures.php" class="text-decoration-none">
                <div class="card card-dashboard bg-info shadow-sm">
                    <i class="bi bi-cash-stack"></i>
                    <div class="fs-2">6</div>
                    <div class="fw-bold">Factures</div>
                </div>
                </a>
                <a href="views/ajout_facture.php" class="btn btn-outline-info w-100 mt-2"><i class="bi bi-file-earmark-plus"></i> Ajouter une facture</a>
            </div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <a href="views/produits.php" class="text-decoration-none">
                <div class="card card-dashboard bg-secondary shadow-sm">
                    <i class="bi bi-box-seam"></i>
                    <div class="fs-2">10</div>
                    <div class="fw-bold">Produits</div>
                </div>
                </a>
                <a href="views/ajout_produit.php" class="btn btn-outline-secondary w-100 mt-2"><i class="bi bi-plus-square"></i> Ajouter un produit</a>
            </div>
            <div class="col-md-3">
                <a href="views/categorie.php" class="text-decoration-none">
                <div class="card card-dashboard bg-dark shadow-sm">
                    <i class="bi bi-tags"></i>
                    <div class="fs-2">4</div>
                    <div class="fw-bold">Catégories</div>
                </div>
                </a>
                <a href="views/ajout_categorie.php" class="btn btn-outline-dark w-100 mt-2"><i class="bi bi-tags"></i> Ajouter une catégorie</a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">Dernières commandes</div>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="3" class="text-center text-muted">Aucune commande récente</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">Dernières factures</div>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Client</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="3" class="text-center text-muted">Aucune facture récente</td></tr>
                        </tbody>
                    </table>
                </div>
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
