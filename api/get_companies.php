<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
require_once '../config.php';

// جلب معرف الشركة من الطلب
$id = $_GET['id'] ?? null;

if ($id) {
    // جلب بيانات الشركة من الجدول
    $query = "SELECT * FROM company WHERE id = :id";
    $stmt = $databass->prepare($query);
    $stmt->execute(['id' => $id]);
    $company = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($company) {
        echo json_encode($company);
        exit();
    } else {
        echo json_encode(['error' => 'Company not found.']);
    }
} else {

    // جلب جميع الشركات من الجدول
        $query = "SELECT * FROM company";
        $stmt = $databass->prepare($query);
        $stmt->execute();
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // إرجاع البيانات كـ JSON
        echo json_encode($companies);
        exit();

}
?>