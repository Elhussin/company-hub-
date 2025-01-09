<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

// تحقق من أن الطلب هو POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // استقبال البيانات من النموذج
    $name = $_POST['name'] ?? '';
    $country = $_POST['country'] ?? '';
    $tell = $_POST['tell'] ?? '';
    $fax = $_POST['fax'] ?? '';
    $email = $_POST['email'] ?? '';
    $wep = $_POST['wep'] ?? '';
    $cotegray = $_POST['cotegray'] ?? '';
    $ROEL = $_POST['ROEL'] ?? '';

    // هنا يمكنك إضافة التحقق من البيانات وإدخالها في قاعدة البيانات
    require_once '../config.php';
    // مثال بسيط للتحقق
    if (!empty($name) && !empty($cotegray) && !empty($ROEL)) {
        // إدخال البيانات في قاعدة البيانات (هذا مثال بسيط)

        $sql = "SELECT * FROM company WHERE name = :name AND ROEL = :role";
        $stmt = $databass->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $ROEL);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            echo json_encode(['message' => 'Company alread add exits!']);
            exit();
        }
        
        $sql = "INSERT INTO company (name,country,tell, fax, email, wep, cotegray, ROEL) VALUES (?, ?, ?,?, ?, ?, ?, ?)";
        $stmt = $databass->prepare($sql);
        $stmt->execute([$name,$country,$tell, $fax, $email, $wep, $cotegray, $ROEL]);
        // إرجاع رسالة نجاح
        echo json_encode(['message' => 'Company added successfully!']);
        exit();
    } else {
        // إرجاع رسالة خطأ
        echo json_encode(['message' => 'Please fill all required fields.']);
        exit();
    }
} else {
    // إرجاع رسالة خطأ إذا لم يكن الطلب POST
    echo json_encode(['message' => 'Invalid request method.']);
    exit();
}
?>




