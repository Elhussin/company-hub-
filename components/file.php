<?php
// إعدادات رفع الملفات
$targetDir = "uploads/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf'); // أنواع الملفات المسموح بها
$maxFileSize = 5 * 1024 * 1024; // الحد الأقصى لحجم الملف (5MB)
$statusMsg = [];
$status = "success";

// التحقق من وجود مجلد uploads وإنشاؤه إذا لم يكن موجودًا
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// معالجة الملفات المرسلة
if (!empty($_FILES)) {
    foreach ($_FILES as $fileInput => $files) {
        if (is_array($files['name'])) { // إذا تم رفع عدة ملفات
            foreach ($files['name'] as $key => $name) {
                $fileName = basename($files['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $fileSize = $files['size'][$key];

                // التحقق من نوع الملف
                if (in_array($fileType, $allowTypes)) {
                    // التحقق من حجم الملف
                    if ($fileSize <= $maxFileSize) {
                        // رفع الملف إلى المجلد
                        if (move_uploaded_file($files['tmp_name'][$key], $targetFilePath)) {
                            $statusMsg[] = "The file '{$fileName}' has been uploaded successfully.";
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

            // التحقق من نوع الملف
            if (in_array($fileType, $allowTypes)) {
                // التحقق من حجم الملف
                if ($fileSize <= $maxFileSize) {
                    // رفع الملف إلى المجلد
                    if (move_uploaded_file($files['tmp_name'], $targetFilePath)) {
                        $statusMsg[] = "The file '{$fileName}' has been uploaded successfully.";
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
?>