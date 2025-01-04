
<?php  require_once '../html/icon.html';?>
<div style="overflow:auto">
    <div class="menu" style="background-color:red;  ">
      <!-- <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
      <a href="#">Link 4</a> -->
    </div>





    <div class="main" style="margin-top:20px ;">
<table class="table  table-borderless">
    <thead></thead>
    <tbody>
        <form action="" method="POST" id="add_new_company">
            <tr>
               <th class="table-primary" >company</th>
                <td>
                    <select class="form-control" name="company_id" id="company_id">
                        <?php
                        require_once '../php/dps.php';

                        $cheak = $databass->prepare(" SELECT DISTINCT * FROM `users` WHERE ROEL='Agent' AND  cotegray ='lens'  or cotegray='all' ");
                        $cheak->execute();

                        foreach ($cheak as $view) {

                            echo '<option value="' . $view["NAME"] . $view["ID"] . '" > ' . $view["ID"] . '-' . $view["NAME"] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="button" value="New Company" onclick="OpenWindow_newcompany()">
                    
                </td>
            </tr>


            <tr>
               <th class="table-primary" >Brand </th>
                <td>
                    <select class="form-control" name="brand_name" id="brand_name">
                        <?php
                        require_once '../php/dps.php';

                        $cheak_brand = $databass->prepare(" SELECT DISTINCT *  FROM `brand` WHERE `type`='lens'");
                        $cheak_brand->execute();
                        foreach ($cheak_brand as $view) {

                            echo '<option value="'  . $view["name"] . $view["ID"] . '" > ' . $view["companyID"] . '-' . $view["name"] . '</option>';
                        }

                        ?>
                    </select>
                    <input type="button" value="New Brand" onclick="OpenWindow()">
                </td>
            </tr>




            <tr>
               <th class="table-primary" >cotgery </th>
                <td>
                    <select class="form-control" name="cotger" id="cotger">
                    <option >select</option>
                        <option value="1">Rady </option>
                        <option value="2">Lab </option>
                        
                </td>
            </tr>

            <tr>
               <th class="table-primary" >type</th>
                <td>
                    <select class="form-control" name="typelens" id="typelens">
                    <option >select</option>

                        <option value="3">plastic</option>
                        <option value="4">glass</option>
                    </select>

                </td>
            </tr>
            <tr>
               <th class="table-primary" >Index</th>
                <td>
                    <select class="form-control" name="index" id="index">
                        <option value="5">1.5</option>
                        <option value="6">1.56</option>
                        <option value="7">1.6</option>
                        <option value="8">1.67</option>
                        <option value="9">1.74</option>
                        <option value="11">1.76</option>
                        <option value="12">1.8</option>
                        <option value="13">1.9</option>
                    </SELECt>

                </td>
            </tr>

            <tr>
               <th class="table-primary" >coted</th>
                <td>
                <div class="form-check form-check-inline">



                    <input class="form-check-input" type="checkbox"  name="type[]" id=" NOR" value="NOR">
                    <label class="form-check-label" for="">NOR</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id="MC" value="MC">
                    <label class="form-check-label" for="">MC</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" Color" value="Color">
                    <label class="form-check-label" for="">Color</label><br>

                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" TRN_brown" value="TB">
                    <label class="form-check-label" for="">TRN Brown</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" TRN_Gray" value="TG">
                    <label class="form-check-label" for="">TRN Gray</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" blue" value="BR">
                    <label class="form-check-label" for="">blue Ray</label><br>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" UV" value="UV">
                    <label class="form-check-label" for="">UV</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id=" Bolarid" value="PD" >
                    <label class="form-check-label" for=""> Polarid</label><br>
                    <input class="form-check-input" type="checkbox"  name="typev" id="POLY" value="PC">
                    <label class="form-check-label" for="">POLY carbon</label><br>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="type[]" id="singl" value="SV">
                    <label class="form-check-label" for="">singl Visian</label><br>
                    <input class="form-check-input" type="checkbox"  name="type[]" id="Bifocal" value="BF" >
                    <label class="form-check-label" for=""> Bifocal</label><br>
                    <input class="form-check-input" type="checkbox"  name="typev" id="Multi" value="MF">
                    <label class="form-check-label" for="">Multi Focal</label><br>
                  </div>
                </td>

            </tr>
            
            <tr>
            <th class="table-primary" > Special type</th>
                <td> <input class="form-control"  type="text  " name="Special" id="Special"></td>

            </tr>
            <tr>
             
            <!-- <th class="table-primary" > type</th> -->
            <td> <input   class="form-control"   name="lens_type" id="lens_type" value="lens" hidden ></td>
        

            </tr>
            <tr>
                <td colspan="2"> <button class=" form-control btn btn-info" type="submit" name="new_type"> Add New Lens TYPE </button></td>

            </tr>
        </form>
    </tbody>
</table>
    </div>
    </div>

<?php


if (isset($_POST["new_type"])) {
    $acoted = $_POST['type'];
    $cotd_descrip='';
    if (empty($acoted)) {
        // echo("You didn't select any buildings.");
    } else {
        $N = count($acoted);
        $cotd_type ='';

        // echo("You selected $N door(s): ");
        for ($i = 0; $i < $N; $i++) {
        // echo ($acoted[$i] . " ");
        }
    }

    $cotger = '';
    if ($_POST["cotger"] == 1) {
        $cotger = "Rl";
    } elseif ($_POST["cotger"] == 2) {
        $cotger = "XR";
    }
    $typelens = '';
    if ($_POST["typelens"] == 3) {
        $typelens = "PL";
    } elseif ($_POST["typelens"] == 4) {
        $typelens = "GL";
    }
    $INDEX = '';
    if ($_POST["index"] == 5) {
        $INDEX = "1.50";
    } elseif ($_POST["index"] == 6) {
        $INDEX = "1.56";
    } elseif ($_POST["index"] == 7) {
        $INDEX = "1.60";
    } elseif ($_POST["index"] == 8) {
        $INDEX = "1.67";
    } elseif ($_POST["index"] == 9) {
        $INDEX = "1.74";
    } elseif ($_POST["index"] == 11) {
        $INDEX = "1.76";
    } elseif ($_POST["index"] == 12) {
        $INDEX = "1.80";
    } elseif ($_POST["index"] == 13) {
        $INDEX = "1.90";
    }

    // lens descriptian 
    $cotd_descrip = implode("-", $acoted);
    $Special= $_POST["Special"];
}



$meesage = '';
require_once '../php/dps.php';
if (isset($_POST["new_type"])) {

    $brand_name = substr($_POST['brand_name'], 0, -4);
    $brandid = substr($_POST['brand_name'], -4);
    $combany_name = substr($_POST['company_id'], 0, -4);
    $combany_id = substr($_POST['company_id'], -4);

    $descrip =$combany_name .'-'. $cotger . "-" . $typelens . "-" .  $INDEX.'-'. $cotd_descrip .$Special;

    $type1 = implode("", $acoted);
    $type2 =$_POST['cotger'] . $_POST['typelens'] . $_POST['index']. $type1. $Special ;
    //   echo "Type code:". $type2;
    $cheakbrand = $databass->prepare("SELECT DISTINCT `type` FROM `prodect` WHERE type ='".$type2."'   ");
    $cheakbrand->execute();
    if ($cheakbrand->rowCount() > 0) {
        echo  $meesage = '<P class="alert alert-danger" role="alert"> this Tpey add befor already<p>';
    } else {

        $addbrand = $databass->prepare("INSERT INTO `prodect`(`brand`,`name_s`,`type`,`lens_type`,`lens_cotger`,`lens_index`,`lens_cotd`,`companyID`,`brand_id`,`comapny`,`descrip`) VALUES
         (:brand,:name_s, :type1,:typelens,:cotger,:lens_index,:cotd,:companyID,:brand_id ,:comapny ,:descrip)");
        $addbrand->bindParam('brand', $brand_name);
        $addbrand->bindParam('name_s',$_POST['lens_type']);
        $addbrand->bindParam('type1', $type2);

        $addbrand->bindParam('typelens', $typelens);
        $addbrand->bindParam('cotger', $cotger);
        $addbrand->bindParam('lens_index', $INDEX);
        $addbrand->bindParam('cotd', $cotd_descrip);

        $addbrand->bindParam('brand_id', $brandid);
        $addbrand->bindParam('comapny', $combany_name);
        $addbrand->bindParam('companyID', $combany_id);
        $addbrand->bindParam('descrip', $descrip);
      


        if ($addbrand->execute()) {

            echo   $meesage = '<P class="alert alert-dark" role="alert">Done add new Brand <p>';
        } else {
            //  var_dump($addbrand->errorInfo());
        }
    }
}

?>



       <script src="prodect/additeam.js"></script>
