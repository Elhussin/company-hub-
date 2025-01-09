<?php
require_once '../config.php';

// الحصول على نوع المنتج من الطلب
$type = isset($_POST['type']) ? $_POST['type'] : '';

// تحديد الاستعلام بناءً على النوع
if ($type == 'lens') {
    $query = "SELECT DISTINCT * FROM `brand` WHERE `type`='lens'";
} elseif ($type == 'fram') {
    $query = "SELECT DISTINCT * FROM `brand` WHERE `type`='fram'";
} else {
    $query = "SELECT DISTINCT * FROM `brand`";
}

$brands = $databass->query($query)->fetchAll();

// إرجاع الخيارات كـ HTML
if ($brands) {
    echo "<select class='form-control' name='brand_id'>";
    echo "<option value=''>Select Brand</option>";
    foreach ($brands as $brand) {
        echo "<option value='" . htmlspecialchars($brand['id']) . "'>" . htmlspecialchars($brand['name']) . "</option>";
    }
    echo "</select>";
} else {
    echo "<p>No brands found for selected type.</p>";
}
?>
