<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method: POST");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// الاتصال بقاعدة البيانات
require_once '../config.php';

// قراءة البيانات من الطلب
$postdata = file_get_contents('php://input');
$postdata = json_decode($postdata);

// التحقق من وجود بيانات إدخال
if (!$postdata || empty($postdata->value)) {
    // إذا لم يتم توفير قيمة البحث، جلب كل المستخدمين
    try {
        $getdata = $databass->prepare("SELECT * FROM `users`");
        $getdata->execute();
        $result = $getdata->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to fetch users",
            "error" => $e->getMessage()
        ]);
    }
    exit;
}

// استعلام البحث
try {
    // إعداد قيمة البحث مع الـ %
    $searchValue = "%" . $postdata->value . "%";

    $getdata = $databass->prepare("SELECT * FROM `users` 
        WHERE userName LIKE :SEARCHVALUE 
        OR tell LIKE :SEARCHVALUE 
        OR EmpolyId LIKE :SEARCHVALUE");

    $getdata->bindParam(':SEARCHVALUE', $searchValue, PDO::PARAM_STR);

    $getdata->execute();
    $result = $getdata->fetchAll(PDO::FETCH_ASSOC);

    // تحويل النتائج إلى JSON وإرسالها كاستجابة
    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database query failed",
        "error" => $e->getMessage()
    ]);
}
?>
