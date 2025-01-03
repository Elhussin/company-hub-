<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method:POST");

if(isset($_POST['user'])&&isset($_POST['tell'])){
    require_once '../php/dps.php';
    $cheak=$databass->prepare("SELECT * FROM `user` WHERE EmpolyId=:EmpolyId");
    $cheak->bindParam('EmpolyId',$_POST['empolyId']);
    // $cheak->bindParam('userName',$_POST['user']);
    $cheak->execute();
//  AND  userName=:userName
    if($cheak->rowCount()>0){
        print_r(json_encode(array("messeg"=>"  Empoly ID  USED BEFOR ")));
    }



    else{
    $add=   $databass->prepare("INSERT INTO user (NAME,userName,tell,pasword,age,gender,EmpolyId,stat)
     VALUES (:NAME,:userName,:tell,:pasword, :age, :gender, :EmpolyId ,'0')");
    $add->bindParam('NAME',$_POST['name']);
    $add->bindParam('tell',$_POST['tell']);
    $add->bindParam('userName',$_POST['user']);
    $add->bindParam('pasword',$_POST['pasword']);
    $add->bindParam('age',$_POST['age']);
    $add->bindParam('gender',$_POST['gender']);
    $add->bindParam('EmpolyId',$_POST['empolyId']);
  

if($add->execute()){

    print_r(json_encode(array("messeg"=>"  New User Add ")));
}else{
    var_dump($add->errorInfo());
}
}
}


?>