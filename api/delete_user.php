<?php
header('Content-Type: application/json'); // تأكد من تعيين الرأس كـ JSON
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

include_once '../config.php'; // تأكد من تضمين ملف الإعدادات

$response = ['success' => false, 'message' => 'Invalid request']; // استجابة افتراضية

if(!$databass){
    $response['success'] = false;
    $response['message'] = 'Error  databass Not connect';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true); // قراءة البيانات المرسلة كـ JSON

    if (isset($data['id'])) {
        $userId = $data['id'];

        try {
            // مثال: حذف المستخدم من قاعدة البيانات
            $stmt = $databass->prepare("DELETE FROM users WHERE ID = :id");
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $response['success'] = true;
                $response['message'] = 'User deleted successfully';
            } else {
                $response['message'] = 'User not found';
            }
        } catch (PDOException $e) {
            $response['message'] = 'Database error: ' . $e->getMessage();
        }
    } else {
        $response['message'] = 'User ID is missing';
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response); // إرجاع الاستجابة كـ JSON
exit;
?>