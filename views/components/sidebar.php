<?php
// Sidebar principale
?>
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
    @media (max-width: 991px) {
        .sidebar { position: static; width: 100%; min-height: auto; border-right: none; }
        .header { left: 0; }
        .main-content { margin-left: 0; margin-top: 80px; }
        .footer { left: 0; }
    }
</style>
<aside class="sidebar vh-100 p-3 position-fixed top-0 start-0 d-flex flex-column justify-content-between" style="width:240px;z-index:100; background:#fff; border-right:1px solid #e5e7eb;">
    <div>
        <a class="navbar-brand d-flex align-items-center mb-4 text-light" href="../dashboard.php">
            <i class="bi bi-kanban-fill me-2"></i> Gestion Projets
        </a>
        <nav class="nav flex-column">
            <a class="nav-link text-light" href="../dashboard.php"><i class="bi bi-house-door me-2"></i>Tableau de bord</a>
            <a class="nav-link text-light" href="../views/projets.php"><i class="bi bi-folder2-open me-2"></i>Projets</a>
            <a class="nav-link text-light" href="../views/employes.php"><i class="bi bi-people me-2"></i>Employés</a>
            <a class="nav-link text-light" href="../views/clients.php"><i class="bi bi-person-badge me-2"></i>Clients & Commandes</a>
            <a class="nav-link text-light" href="../views/produits.php"><i class="bi bi-box-seam me-2"></i>Produits & Catégories</a>
            <a class="nav-link text-light" href="../views/factures.php"><i class="bi bi-receipt me-2"></i>Factures</a>
            <hr class="bg-secondary">
            <a class="nav-link text-danger" href="../auth/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a>
        </nav>
    </div>
</aside>
