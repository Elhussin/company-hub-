<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
require_once '../config.php';

// الحصول على معرف الشركة من الطلب
$id = $_GET['id'] ?? null;

if ($id) {
    // حذف الشركة من الجدول
    $query = "DELETE FROM company WHERE id = :id";
    $stmt = $databass->prepare($query);
    $stmt->execute(['id' => $id]);

    echo json_encode(['message' => 'Company deleted successfully!']);
} else {
    echo json_encode(['error' => 'Invalid company ID.']);
}
?>