<?php
require_once '../controllers/CategorieController.php';
if (!isset($_GET['id'])) {
    header('Location: categories.php');
    exit;
}
$id = $_GET['id'];
CategorieController::delete($id);
header('Location: categories.php');
exit;
