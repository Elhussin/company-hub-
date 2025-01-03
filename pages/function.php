<?php
function redirectUser($role) {
    $routes = [
        "USER" => "user/user.php",
        "ADMIN" => "admin/admin.php",
        "coust" => "coustmer/coustmer.php",
    ];

    if (array_key_exists($role, $routes)) {
        header("Location: " . $routes[$role], true);
        exit();
    } else {
        header("Location: index.php", true); // صفحة افتراضية في حال لم يكن الدور معروفًا
        exit();
    }
}



?>