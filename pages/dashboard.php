<?php
// session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?=login");
    exit();
}

$user = $_SESSION['user'];

if ($user->ROEL === "USER") {
    
    // منطق المستخدم العادي
    // include 'coustmer.php';
    include __DIR__ . '/coustmer.php';

    echo "مرحبًا، مستخدم!";
} elseif ($user->ROEL === "ADMIN") {
    // منطق المسؤول
    // include 'admin.php';
    include __DIR__ . '/admin.php';


} elseif ($user->ROEL === "coust") {
    // منطق العميل
    echo "مرحبًا، عميل!";
} else {
    echo "دور غير معروف.";
}

// hasin.tah@yahoo.com