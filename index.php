<?php
// تحديد الصفحة الحالية بناءً على GET
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// مصفوفة بيانات الصفحات
$page_data = [
    'home' => [
        'title' => 'Company Hub',
        'description' => 'An innovative application designed to streamline business management and enhance communication within teams across organizations.',
    ],
    'about' => [
        'title' => 'About Us - CompanyHub',
        'description' => 'Learn more about our company and the services we offer.',
    ],
    'contact' => [
        'title' => 'Contact Us - CompanyHub',
        'description' => 'Get in touch with us for any inquiries or support.',
    ],
];

// التحقق من وجود بيانات الصفحة وإعداد القيم الافتراضية
$title = isset($page_data[$page]['title']) ? $page_data[$page]['title'] : 'Company Hub';
$description = isset($page_data[$page]['description']) ? $page_data[$page]['description'] : 'An innovative application designed to streamline business management and enhance communication within teams across organizations.';

// تضمين الرأس مع تمرير البيانات
include 'layout/header.php';
?>

<?php
// تضمين محتوى الصفحة
$file = "pages/" . $page . ".php";
if (file_exists($file)) {
    include $file;
} else {
    include "pages/404.php";
}
?>

<?php include 'layout/footer.php'; ?>
