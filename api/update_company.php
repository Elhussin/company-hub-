<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// جلب معرف الشركة من الطلب
$id = $_GET['id'] ?? null;

if ($id) {
    // استقبال البيانات من النموذج
    $name = $_POST['name'] ?? '';
    $country = $_POST['country'] ?? '';
    $tell = $_POST['tell'] ?? '';
    $fax = $_POST['fax'] ?? '';
    $email = $_POST['email'] ?? '';
    $wep = $_POST['wep'] ?? '';
    $cotegray = $_POST['cotegray'] ?? '';
    $ROEL = $_POST['ROEL'] ?? '';
    require_once '../config.php';
    // تحديث بيانات الشركة في الجدول
    $query = "UPDATE company SET name = :name, country = :country, tell = :tell, fax = :fax, email = :email, wep = :wep, cotegray = :cotegray, ROEL = :ROEL WHERE id = :id";
    $stmt = $databass->prepare($query);
    $stmt->execute([
        'name' => $name,
        'country' => $country,
        'tell' => $tell,
        'fax' => $fax,
        'email' => $email,
        'wep' => $wep,
        'cotegray' => $cotegray,
        'ROEL' => $ROEL,
        'id' => $id
    ]);

    echo json_encode(['message' => 'Company updated successfully!']);
} else {
    echo json_encode(['error' => 'Invalid company ID.']);
}
?>