<?php
require_once '../controllers/UtilisateurController.php';
if (!isset($_GET['id'])) {
    header('Location: employes.php');
    exit;
}
$id = $_GET['id'];
UtilisateurController::delete($id);
header('Location: employes.php');
exit;
