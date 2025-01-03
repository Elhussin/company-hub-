<?php
header("Access-Control-Allow-Origin:*");//لتمكي الاخرين من الوصول لمعلومات 
header("Content-Type: application/json charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method:POST");
// $usernam='root2';
// $pass='';
// $databass= new PDO("mysql:host=localhost; dbname=company;" ,$usernam ,$pass ); 
require_once '../php/dps.php';
// $cn=mysqli_connect("localhost","root","","company") or die("Could not Connect My Sql");
// include('dps.php') ;
// للحصول علي البيانات المرله للاتعلام عنها
$postdata= file_get_contents('php://input'); 
//ثم تحويل البيانات الي object
$postdata=json_decode($postdata);


$getdata= $databass->prepare("SELECT * FROM `view` WHERE imgid LIKE :SEARCHVALUE ");
$getdata->bindParam('SEARCHVALUE',$postdata->value);
// $res=mysqli_query($cn,"select * from view ");
// للبحث بشروط 
// WHERE NAME LIKE :SEARCHVALUE OR  ID LIKE :SEARCHVALUE"

$getdata->execute();
$getdata=$getdata->fetchAll(PDO::FETCH_ASSOC);  // تحويل الي ARRAY 

print_r(json_encode($getdata)); // لتحويل الي json 
?>