
<?php
$meesage = '';
require_once '../php/dps.php';
$code= $_POST['company_id'].'-'.$_POST['brand_name_s'].'-'.$_POST['brand_name'];
if (isset($_POST["new_brand"])) {
    $cheakbrand = $databass->prepare("SELECT * FROM `brand` WHERE `code`='".$code."' ") ;
    $cheakbrand->execute();
    if($cheakbrand->rowCount()>0){
    echo  $meesage = '<P class="alert alert-danger" role="alert"> this Brand add befor already<p>';
    // var_dump($addbrand->errorInfo());
    } else {
   
        
        $addbrand = $databass->prepare("INSERT   INTO `brand`(`name`,`type`,`companyID`,`code`) VALUES
         (:brand, :type1,:companyID,:code)");
        $addbrand->bindParam('brand', $_POST['brand_name']);
        $addbrand->bindParam('code', $code);
        $addbrand->bindParam('type1', $_POST['brand_name_s']);
        $addbrand->bindParam('companyID', $_POST['company_id']);
        if ($addbrand->execute()) {

            echo   $meesage = '<P class="alert alert-dark" role="alert">Done add new Brand <p>';
        } else {
            //  var_dump($addbrand->errorInfo());
        }
    }
} 

?>


