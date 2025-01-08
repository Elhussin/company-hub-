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

    require_once '../config.php';

$postdata= file_get_contents('php://input'); 
//ثم تحويل البيانات الي object
$postdata=json_decode($postdata);


$getdata= $databass->prepare("SELECT * FROM `view` WHERE imgid LIKE :SEARCHVALUE ");
$getdata->bindParam('SEARCHVALUE',$postdata->value);

$getdata->execute();
$getdata=$getdata->fetchAll(PDO::FETCH_ASSOC);  // تحويل الي ARRAY 

print_r(json_encode($getdata)); // لتحويل الي json 
?>