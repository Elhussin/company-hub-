<?php
// api get  من نوع 
// اوامر للماح باوامر fitch
// موقع fitch
//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
header("Access-Control-Allow-Origin:*");//لتمكي الاخرين من الوصول لمعلومات 
header("Content-Type: application/json charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method:POST");



// $data=file_get_contents("php://input"); // للاستقبال البيانات 
// استقبال البيانت المرسله الي نفس الملف 
move_uploaded_file($_FILES['file']['tmp_name'] ,$_FILES['file']['name']);
move_uploaded_file($_FILES['fil1']['tmp_name'] ,$_FILES['file1']['name']);

// var_dump($_FILES);
// print_r($_POST);





?>