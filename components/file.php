<?php
session_start();
header('Content-Type: application/json');
include_once '../config.php'; // تأكد من وجود ملف config.php لتوصيل قاعدة البيانات
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// إعدادات رفع الملفات
$targetDir = "uploads/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf'); // أنواع الملفات المسموح بها
$maxFileSize = 10 * 1024 * 1024; // الحد الأقصى لحجم الملف (5MB)
$statusMsg = [];
$status = "success";

// التحقق من وجود مجلد uploads وإنشاؤه إذا لم يكن موجودًا
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (!is_writable($targetDir)) {
    echo json_encode(["status" => "error", "message" => "Upload directory is not writable."]);
    exit;
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo json_encode(["status" => "debug", "message" => "POST request received."]);
//     exit;
// }


if (isset($_SESSION['user'])) {

    $user = $_SESSION['user']['id'];
}




// معالجة الملفات المرسلة
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo json_encode(["status" => "debug", "message" => "POST request received."]);

    foreach ($_FILES as $fileInput => $files) {
        if (is_array($files['name'])) { // إذا تم رفع عدة ملفات
            foreach ($files['name'] as $key => $name) {
                $fileName = basename($files['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $fileSize = $files['size'][$key];
                if (!in_array($fileType, $allowTypes)) {
                    echo json_encode(["status" => "error", "message" => "File type not allowed."]);
                    exit;
                }
                // جلب اسم ووصف الملف
                $name = $_POST["name{$fileInput}_{$key}"] ?? ''; // اسم الملف
                $description = $_POST["description{$fileInput}_{$key}"] ?? ''; // وصف الملف

                // التحقق من نوع الملف
                if (in_array($fileType, $allowTypes)) {
                    // التحقق من حجم الملف
                    if ($fileSize <= $maxFileSize) {
                        // رفع الملف إلى المجلد
                        if (move_uploaded_file($files['tmp_name'][$key], $targetFilePath)) {
                            // حفظ البيانات في قاعدة البيانات
                            try {
                                $stmt = $databass->prepare("INSERT INTO `images` (file_name, name, description,userid) VALUES (:file_name, :name, :description, 1015)");
                                $stmt->bindParam(':file_name', $fileName);
                                $stmt->bindParam(':name', $name);
                                $stmt->bindParam(':description', $description);
                                $stmt->execute();
                                $statusMsg[] = "The file '{$fileName}' has been uploaded successfully.";
                                exit;
                            } catch (PDOException $e) {
                                $statusMsg[] = "Failed to save '{$fileName}' to database: " . $e->getMessage();
                                $status = "error";
                            }
                        } else {
                            $statusMsg[] = "Sorry, there was an error uploading '{$fileName}'.";
                            $status = "error";
                        }
                    } else {
                        $statusMsg[] = "The file '{$fileName}' exceeds the maximum allowed size (5MB).";
                        $status = "error";
                    }
                } else {
                    $statusMsg[] = "The file '{$fileName}' is not allowed. Only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
                    $status = "error";
                }
            }
        } else { // إذا تم رفع ملف واحد
            $fileName = basename($files['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $fileSize = $files['size'];

            // جلب اسم ووصف الملف
            $name = $_POST["name{$fileInput}_0"] ?? ''; // اسم الملف
            $description = $_POST["description{$fileInput}_0"] ?? ''; // وصف الملف

            // التحقق من نوع الملف
            if (in_array($fileType, $allowTypes)) {
                // التحقق من حجم الملف
                if ($fileSize <= $maxFileSize) {
                    // رفع الملف إلى المجلد
                    if (move_uploaded_file($files['tmp_name'], $targetFilePath)) {
                        // حفظ البيانات في قاعدة البيانات
                        try {
                            $stmt = $databass->prepare("INSERT INTO `images` (file_name, name, description) VALUES (:file_name, :name, :description)");
                            $stmt->bindParam(':file_name', $fileName);
                            $stmt->bindParam(':name', $name);
                            $stmt->bindParam(':description', $description);
                            $stmt->execute();

                            $statusMsg[] = "The file '{$fileName}' has been uploaded successfully.";
                        } catch (PDOException $e) {
                            $statusMsg[] = "Failed to save '{$fileName}' to database: " . $e->getMessage();
                            $status = "error";
                        }
                    } else {
                        $statusMsg[] = "Sorry, there was an error uploading '{$fileName}'.";
                        $status = "error";
                    }
                } else {
                    $statusMsg[] = "The file '{$fileName}' exceeds the maximum allowed size (5MB).";
                    $status = "error";
                }
            } else {
                $statusMsg[] = "The file '{$fileName}' is not allowed. Only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
                $status = "error";
            }
        }
    }
} else {
    $statusMsg[] = "Please select a file to upload.";
    $status = "error";
}

// إرجاع النتيجة كـ JSON
echo json_encode([
    "status" => $status,
    "messages" => $statusMsg
]);
exit;
?>