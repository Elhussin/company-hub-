<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Method:POST");


if (isset( $_POST['email'])) {
    require_once '../php/dps.php';
    $name =$_POST['name'];
    $cheak = $databass->prepare(" SELECT NAME FROM `users` WHERE `NAME`='".$name."'  ");
    // $cheak->bindParam('NAME1', $_POST['NAME']);
    $cheak->execute();

    if ($cheak->rowCount()>0) {
        print_r(json_encode(array("messeg" =>"Company ADD  BEFOR")));
        // var_dump($cheak->errorInfo());
     } else {
        $add = $databass->prepare("INSERT INTO users (`NAME`, `lastName`, `EMAIL`, `AGE`, `PASSWORD`, `ACTIEV`, `SECUERTY_COD`, `ROEL`, `userName`, 
        `tell`, `gender`, `EmpolyId`, `stat`, `fax`, `wep`, `cotegray`, `contery`)
          VALUES (:NAME2,:lastName,:Email, :age, :pasword,:ACTIEV,:SECUERTY_COD ,:ROEL, :userName, :tell,:gender,
          :EmpolyId,:stat,:fax ,:wep, :cotegray,:contery )");

        $add->bindParam('NAME2', $_POST['name']);
        $add->bindParam('lastName', $_POST['lastName']);
        $add->bindParam('Email', $_POST['email']);
        $add->bindParam('age', $_POST['age']);
        $add->bindParam('pasword', $_POST['pasword']);
        $add->bindParam('ACTIEV', $_POST['ACTIEV']);
        $add->bindParam('SECUERTY_COD', $_POST['SECUERTY_COD']);
        $add->bindParam('ROEL', $_POST['ROEL']);
        $add->bindParam('userName', $_POST['userName']);
        $add->bindParam('tell', $_POST['tell']);
        $add->bindParam('gender', $_POST['gender']);
        $add->bindParam('EmpolyId', $_POST['ID']);
        $add->bindParam('stat', $_POST['stat']);
        $add->bindParam('fax', $_POST['fax']);
        $add->bindParam('wep', $_POST['wep']);
        $add->bindParam('cotegray', $_POST['cotegray']);
        $add->bindParam('contery', $_POST['contery']);
        if ($add->execute()) {
            print_r(json_encode(array("messeg" => "New User Add")));
            
        }
    }
}
?>
