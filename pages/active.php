
<div style="height: 100vh;">

<div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100vh; " >

<?php


if(isset($_GET['code'])){
    include_once 'config.php';

// hasin3112@gmail.com
$activ=$databass->prepare("SELECT SECUERTY_COD FROM `users` WHERE SECUERTY_COD =:SECUERTY_COD");
$activ->bindParam("SECUERTY_COD",$_GET['code']);
$activ->execute();
if($activ->rowCount()>0){
    $updte=$databass->prepare("UPDATE `users` SET SECUERTY_COD =:NEWSECUERTY_COD, ACTIEV =true WHERE SECUERTY_COD =:SECUERTY_COD");
   
   $SECUERTY_COD=md5(date("h:i:s"));
   
   
   $updte->bindParam("SECUERTY_COD",$_GET['code']);
   
    $updte->bindParam("NEWSECUERTY_COD",$SECUERTY_COD);
    if($updte->execute()){

        echo '<div class="alert alert-success w-50  " role="alert">
        تم الحقق بنجاح 
      </div>';
      echo '<a href="index.php?page=login""  class="btn btn-primary">Log in </a>';
 
    }
    }else{
        echo '<div class="alert alert-danger w-50" role="alert">
كود غير صالح
        </div>';
    }

}else{
    echo '<div class="alert alert-danger"   role="alert" ><h1>  Did not find activeatin code </h1></div>';
        

 
}

?>

</div>
</div>