<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // استخراج البيانات المحدثة
    $productId = $_POST['id'];
    $productName = $_POST['product-name'];
    $brandId = $_POST['brand-id'];
    $productType = $_POST['product-type'];

    // تحديث المنتج في قاعدة البيانات
    $query = "UPDATE `prodect` SET `PRODECT` = :productName, `brand_id` = :brandId, `cotger` = :productType WHERE `id` = :id";
    $stmt = $databass->prepare($query);

    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
    $stmt->bindParam(':brandId', $brandId, PDO::PARAM_INT);
    $stmt->bindParam(':productType', $productType, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update product']);
    }
}
?>
