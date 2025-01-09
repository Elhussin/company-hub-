<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $databass->prepare("DELETE FROM brand WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // إعادة التوجيه بعد الحذف
    header("Location: index.php?page=view_brand");
    exit();
}
?>