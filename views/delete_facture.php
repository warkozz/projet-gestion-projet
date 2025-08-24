<?php
require_once '../controllers/FactureController.php';
if (!isset($_GET['id'])) {
    header('Location: factures.php');
    exit;
}
$id = $_GET['id'];
FactureController::delete($id);
header('Location: factures.php');
exit;
