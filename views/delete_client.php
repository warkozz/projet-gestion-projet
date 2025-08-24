<?php
require_once '../controllers/ClientController.php';
if (!isset($_GET['id'])) {
    header('Location: clients.php');
    exit;
}
$id = $_GET['id'];
ClientController::delete($id);
header('Location: clients.php');
exit;
