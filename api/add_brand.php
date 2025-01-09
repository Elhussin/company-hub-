
<?php
$meesage = '';
require_once 'config.php';

if (isset($_POST["new_brand"])) {
    $code= $_POST['company_id'].'-'.$_POST['brand_name_s'].'-'.$_POST['brand_name'];
    $cheakbrand = $databass->prepare("SELECT * FROM `brand` WHERE `code`='".$code."' ") ;
    $cheakbrand->execute();
    if($cheakbrand->rowCount()>0){
      $meesage = '<P class="alert alert-danger" role="alert"> this Brand add befor already<p>';
    // var_dump($addbrand->errorInfo());
    } else {
   
        $addbrand = $databass->prepare("INSERT   INTO `brand`(`name`,`type`,`company_id`,`code`) VALUES
         (:brand, :type1,:company_id,:code)");
        $addbrand->bindParam('brand', $_POST['brand_name']);
        $addbrand->bindParam('code', $code);
        $addbrand->bindParam('type1', $_POST['brand_name_s']);
        $addbrand->bindParam('company_id', $_POST['company_id']);
        if ($addbrand->execute()) {

               $meesage = '<P class="alert alert-dark" role="alert">Done add new Brand <p>';
        } else {
            //  var_dump($addbrand->errorInfo());
        }
    }
} 

?>
