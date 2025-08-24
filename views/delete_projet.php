<?php
require_once '../controllers/ProjetController.php';
if (!isset($_GET['id'])) {
    header('Location: projets.php');
    exit;
}
$id = $_GET['id'];
ProjetController::delete($id);
header('Location: projets.php');
exit;
