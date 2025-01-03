<?php
// session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];


if ($user->ROEL === "USER") {
    // منطق المستخدم العادي
    include 'coustmer.php';
    echo "مرحبًا، مستخدم!";
} elseif ($user->ROEL === "ADMIN") {
    // منطق المسؤول
    include 'admin.php';
    echo "مرحبًا، مسؤول!";
} elseif ($user->ROEL === "coust") {
    // منطق العميل
    echo "مرحبًا، عميل!";
} else {
    echo "دور غير معروف.";
}

// hasin.tah@yahoo.com