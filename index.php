<?php
include 'data.php';
// تحديد الصفحة الحالية بناءً على GET
$page = isset($_GET['page']) ? $_GET['page'] : 'home';


// التحقق من وجود بيانات الصفحة وإعداد القيم الافتراضية
$title = isset($page_data[$page]['title']) ? $page_data[$page]['title'] : 'Company Hub';
$description = isset($page_data[$page]['description']) ? $page_data[$page]['description'] : 'An innovative application designed to streamline business management and enhance communication within teams across organizations.';

// تضمين الرأس مع تمرير البيانات
include 'layout/header.php';
?>

<?php
// تعريف المسارات الممكنة للبحث عن الملفات
$paths = [
    "pages/",
    "components/",
    "modules/"
];

// التحقق من وجود الملف في أحد المسارات
$fileFound = false;
foreach ($paths as $path) {
    $file = $path . $page . ".php";
    if (file_exists($file)) {
        include $file;
        $fileFound = true;
        break;
    }
}

// إذا لم يتم العثور على الملف، يتم تضمين صفحة الخطأ
if (!$fileFound) {
    include "pages/404.php";
}

// تضمين تذييل الصفحة
include 'layout/footer.php';
?>


