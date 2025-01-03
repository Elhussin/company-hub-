<?php
include_once 'config.php';
session_start();
if (isset($_POST['login'])) {
    $login = $databass->prepare("SELECT * FROM `users` WHERE EMAIL=:EMAIL AND PASSWORD=:PASSWORD");
    $passwordUser = sha1($_POST['bassword']);
    $login->bindParam("EMAIL", $_POST['email']);
    $login->bindParam("PASSWORD", $passwordUser);
    $login->execute();

    if ($login->rowCount() === 1) {
        $user = $login->fetchObject();
        
        if ($user->ACTIEV === "1") {
            $_SESSION['user'] = $user;

            $routes = [
                "USER" => "dashboard.php",
                "ADMIN" => "dashboard.php",
                "coust" => "dashboard.php",
            ];

            echo json_encode([
                "status" => "success",
                "redirect" => $routes[$user->ROEL] ?? "index.php",
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "يرجى تفعيل الحساب.",
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "خطأ في بيانات الدخول.",
        ]);
    }
}

?>