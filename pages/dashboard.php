<?php
// session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?=login");
    exit();
}

$user = $_SESSION['user'];
echo '<pre>';
print_r($_SESSION['user']);

// echo "ID: " . $user["ID"];


echo '</pre>';
// id	userid	file_name	name	description	uploaded_on	status

if ($user->ROEL === "USER") {
    
    // منطق المستخدم العادي
    include 'coustmer.php';
    echo "مرحبًا، مستخدم!";
} elseif ($user->ROEL === "ADMIN") {
    // منطق المسؤول
    include 'admin.php';
    

} elseif ($user->ROEL === "coust") {
    // منطق العميل
    echo "مرحبًا، عميل!";
} else {
    echo "دور غير معروف.";
}

// hasin.tah@yahoo.com