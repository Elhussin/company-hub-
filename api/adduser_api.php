<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method: POST");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// تحقق من المدخلات
if (isset($_POST['name'], $_POST['user'], $_POST['tell'], $_POST['pasword'], $_POST['age'], $_POST['gender'], $_POST['empolyId'])) {
    require_once '../config.php';

    try {
        // التحقق من وجود EmpolyId مسبقًا
        $check = $databass->prepare("SELECT * FROM `users` WHERE EmpolyId = :EmpolyId");
        $check->bindParam(':EmpolyId', $_POST['empolyId']);
        $check->execute();

        if ($check->rowCount() > 0) {
            echo json_encode(["status" => "error", "messege" => "Employee ID is already in use."]);
            exit;
        }

        // إضافة المستخدم الجديد
        $add = $databass->prepare("INSERT INTO users (NAME, userName, tell, PASSWORD, AGE, gender, EmpolyId, stat) 
            VALUES (:NAME, :userName, :tell, :pasword, :age, :gender, :EmpolyId, 1)");

        $add->bindParam(':NAME', $_POST['name']);
        $add->bindParam(':userName', $_POST['user']);
        $add->bindParam(':tell', $_POST['tell']);
        $add->bindParam(':pasword', $_POST['pasword']);
        $add->bindParam(':age', $_POST['age']);
        $add->bindParam(':gender', $_POST['gender']);
        $add->bindParam(':EmpolyId', $_POST['empolyId']);

        if ($add->execute()) {
            echo json_encode(["status" => "success", "messege" => "User added successfully"]);
        } else {
            echo json_encode(["status" => "error", "messege" => "Error adding user"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "messege" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "messege" => "Please fill all fields"]);
}

exit;
