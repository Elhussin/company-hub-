<?php
require_once 'config.php';
?>

        <div class="main">

            <table class="table table-borderless">
                <thead>
                    <!--   company  -->


                    <tr>
                        <th colspan="2" style="text-align:center" class="table-dark" class="table-primary" scope="col">
                            Add new Brodect </th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="POST">


                        <!-- select prodect main type -->
                        <tr>
                            <th class="table-primary">Slect iteam Type</th>
                            <td>
                                <select class="form-control" name="PRODECT" id="PRODECT" onchange="brand_fun()">
                                    <option>select </option>
                                    <option value="frame">Frame </option>
                                    <option value="lens">Lens</option>
                                    <option value="contc_Lens">contc Lens</option>
                                    <option value="parts">parts</option>
                                    <option value="Machien">Machien</option>

                                </select>
                            </td>
                        </tr>
                        <script>
                        function brand_fun() {
                            var selectl = document.getElementById('PRODECT');
                            var optionl = selectl.options[selectl.selectedIndex];
                            if (optionl.value == "frame") {
                                document.getElementById('brand_frame').style.display = "block";
                                document.getElementById('fram_type').style.display = "block";
                                document.getElementById('company_frame').style.display = "block";
                                document.getElementById('company_lens').style.display = "none";

                                document.getElementById('brand_lens').style.display = "none";
                                document.getElementById('lens_type').style.display = "none";

                            } else if (optionl.value == "lens") {
                                document.getElementById('brand_frame').style.display = "none"
                                document.getElementById('fram_type').style.display = "none";
                                document.getElementById('company_frame').style.display = "none";
                                document.getElementById('company_lens').style.display = "block";
                                document.getElementById('brand_lens').style.display = "block";
                                document.getElementById('lens_type').style.display = "block";

                            } else {
                                document.getElementById('brand_frame').style.display = "none";
                                document.getElementById('fram_type').style.display = "none";
                                document.getElementById('company_frame').style.display = "none";
                                document.getElementById('company_lens').style.display = "none";
                                document.getElementById('brand_lens').style.display = "none";
                                document.getElementById('lens_type').style.display = "none";

                            }
                        }

                        brand_fun();
                        </script>


                        <!-- compay nams -->
                        <tr>
                            <th class="table-primary"> Company</th>

                            <td>

                                <!--  copmany for fram  -->
                                <select class="form-control" name="company_id_name" id="company_lens"
                                    style="display:none">
                                    <option value=""></option>
                                    <?php
                       

                        $company_lens = $databass->prepare(" SELECT DISTINCT * FROM `company` WHERE ROEL='Agent' AND  cotegray ='lens'  or cotegray='all' ");
                        $company_lens->execute();

                        foreach ($company_lens as $view_C_len) {

                            // echo '<option value="' .$view["ID"] . '" > ' . $view["ID"] . '-' . $view["NAME"] . '</option>';
                            echo '<option value="' . $view_C_len["name"] . $view_C_len["id"] . '" > ' . $view_C_len["name"] . '</option>';
                        }
                        // echo '<option value="' . $view["NAME"] . $view["ID"] . '" > ' . $view["ID"] . '-' . $view["NAME"] . '</option>';

                        ?>
                                    <!--   copmany for e lens  -->
                                </select>


                                <select class="form-control" name="company_id_name" id="company_frame"
                                    style="display:none">
                                    <option value=""></option>
                                    <?php
                       

                        $company_frame = $databass->prepare(" SELECT DISTINCT * FROM `users` WHERE ROEL='Agent' AND  cotegray ='frame'  or cotegray='all' ");
                        $company_frame->execute();

                        foreach ($company_frame as $view_C_frame) {

                            echo '<option value="' . $view_C_frame["NAME"] . $view_C_frame["ID"] . '" > ' . $view_C_frame["NAME"] . '</option>';
                        }
                        ?>
                                </select>



                            </td>
                        </tr>


                        <!-- brand nams -->

                        <tr>
                            <th class="table-primary" scope="row">
                                <input class="btn-warning" type="button" value="ADD New "
                                    onclick="OpenWindow_brand()">Brand

                            </th>
                            <td>
                                <!--  select option for frame brand  -->
                                <select class="form-control" name="brand_name" id="brand_frame" style="display:none">
                                    <option value="">Seleact </option>
                                    <?php

                                    $brand_frame = $databass->prepare(" SELECT DISTINCT *  FROM `brand` WHERE `type`='frame'");
                                    $brand_frame->execute();
                                    foreach ($brand_frame as $view_fram) {

                                        echo '<option value="'  . $view_fram["name"] . $view_fram["ID"] . '" > ' . $view_fram["name"] . '</option>';
                                    }

                                    ?>
                                </select>
                                <!-- select option for lens  rady or lap -->
                                <select class="form-control" name="brand_name" id="brand_lens" style="display:none">
                                    <option value="">Seleact </option>
                                    <?php
                                    $brand_lens = $databass->prepare(" SELECT DISTINCT *  FROM `brand` WHERE `type`='lens'");
                                    $brand_lens->execute();
                                    foreach ($brand_lens as $view_lens) {

                                        // echo '<option value="'. $view["name"] . $view["ID"] . '" > ' . $view["name"] . '</option>';
                                        echo '<option value="'  . $view_lens["name"] . $view_lens["ID"] . '" > ' . $view_lens["name"] . '</option>';
                                    }
                                    ?>
                                </select>

                            </td>
                        </tr>

                        <!--   selet lens&fram Cotgery arraya -->
                        <tr>
                            <th class="table-primary" scope="row">Cotgery</th>
                            <td>
                                <select class="form-control" name="cotgery" id="fram_type">
                                    <option value="SG">Sun Frame</option>
                                    <option value="FR">FR Frame</option>
                                    <option value="SP">Sport Frame</option>
                                </select>
                                <select class="form-control" name="cotgery" scope="row" id="lens_type"
                                    onchange="lens_type_view_fun()">
                                    <option>lens type</option>
                                    <?php
                                    $lens_type_cotgry = $databass->prepare(" SELECT DISTINCT lens_cotger  FROM `prodect`");
                                    $lens_type_cotgry->execute();
                                    foreach ($lens_type_cotgry as $view) {
                                        echo '<option value="' . $view["lens_cotger"] . '" > ' . $view["lens_cotger"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <!-- select single our double -->
                        <tr>
                            <th class="table-primary">Singl / Duble</th>
                            <td>
                                <select class="form-control" name="singl_lens" id="singl_lens">
                                    <option value="singl_lens">Single vision </option>
                                </select>

                                <select class="form-control" name="singl_duble_lens" id="singl_duble_lens"
                                    onchange="duble_lens_fun()">
                                    <option value=""></option>
                                    <option value="singl_lens">Single vision </option>
                                    <option value="duble_lens">Doble visian </option>
                                </select>

                            </td>
                        </tr>

                        <!--  typ of lens if rady or lap  -->
                        <tr>
                            <th class="table-primary" scope="row">
                                <input class="btn-warning" type="button" value="ADD New"
                                    onclick="OpenWindow_lens_type()">
                                lens Type
                            </th>
                            <td>

                                <select class="form-control" name="lens_type_view" id="rady_lens">
                                    <option value="">select </option>
                                    <?php
                                    $rady_lens= $databass->prepare(" SELECT DISTINCT *  FROM `prodect` WHERE lens_cotger='Rl'");
                                    $rady_lens->execute();
                                    foreach ($rady_lens as $view) {
                                        echo '<option value="' . $view["descrip"] . '" > ' . $view["descrip"] . '</option>';

                                    }


                                    ?>
                                    <!-- <input type="text" value=" " > -->
                                </select>
                                <select class="form-control" name="lens_type_view" id="lab_lens">

                                    <option value=""></option>
                                    <?php
                                    $lab_lens= $databass->prepare(" SELECT DISTINCT *  FROM `prodect` WHERE lens_cotger='XR'");
                                    $lab_lens->execute();
                                    foreach ($lab_lens as $view) {
                                        echo '<option value="' . $view["descrip"] . '" > ' . $view["descrip"] . '</option>';
                                    }
                                    ?>
                                </select>



                            </td>

                        </tr>

                        <!-- index  couted  -->


                        <!-- len power our base carve  -->
                        <tr>
                            <th class="table-primary">Power</th>

                            <!--  rady lens  -->
                            <td class="form-control" id="lens_power">
                                <label class=" btn btn-info" for="">sph</label>

                                <select class=" btn btn-light" name="charsph">

                                    <option value="+">+ </option>
                                    <option value="-">- </option>
                                </select>

                                <select class=" btn btn-light" name="sph">
                                    <?php include('../html/power.html'); ?>
                                </select>

                                <label class=" btn btn-info" for="">cyl</label>

                                <select class=" btn btn-light" name="charcyl">
                                    <!-- <option value="+">+</option> -->

                                    <option value="-">-</option>

                                </select>
                                <select class=" btn btn-light" name="cyl">
                                    <?php include('../html/power.html'); ?>
                                </select>

                            </td>
                        </tr>
                        <!--   lab lens doble  -->
                        <tr>
                            <th class="table-primary">Base carv</th>

                            <td class="form-control">

                                <select class=" btn btn-warning" name="base_R_L" id="base_R_L">
                                    <option value="R">R</option>
                                    <option value="L">L</option>
                                </select>

                                <label class=" btn btn-info" for="">Base</label>

                                <select class=" btn btn-light" name="lens_base" id="lens_base">
                                    <option value=""> select</option>
                                    <option value="+00.50"> +00.50 </option>
                                    <option value="+01.00"> +01.00 </option>
                                    <option value="+01.50"> +01.50 </option>
                                    <option value="+02.00"> +02.00 </option>
                                    <option value="+02.50"> +02.50 </option>
                                    <option value="+03.00"> +03.00 </option>
                                    <option value="+03.50"> +03.50 </option>
                                    <option value="+04.00"> +04.00 </option>
                                    <option value="+04.50"> +04.50 </option>
                                    <option value="+05.00"> +05.00 </option>
                                    <option value="+05.50"> +05.50 </option>
                                    <option value="+06.00"> +06.00 </option>
                                    <option value="+06.50"> +06.50 </option>
                                    <option value="+07.00"> +07.00 </option>
                                    <option value="+07.50"> +07.50 </option>
                                    <option value="+08.00"> +08.00 </option>
                                    <option value="+08.50"> +08.50 </option>
                                    <option value="+09.00"> +09.00 </option>
                                    <option value="+09.50"> +09.50 </option>
                                    <option value="+10.00"> +10.00 </option>
                                    <option value="+10.50"> +10.50 </option>
                                    <option value="+11.00"> +11.00 </option>
                                    <option value="+11.50"> +11.50 </option>
                                    <option value="+12.00"> +12.00 </option>
                                </select>

                                <!-- lens base  --><label class=" btn btn-info" for="">ADD</label>
                                <select class=" btn btn-light" id="lens_add" name="lens_add">
                                    <option value=""> select</option>
                                    <option value="+00.25"> +00.25 </option>
                                    <option value="+00.50"> +00.50 </option>
                                    <option value="+00.75"> +00.75 </option>
                                    <option value="+01.00"> +01.00 </option>
                                    <option value="+01.25"> +01.25 </option>
                                    <option value="+01.50"> +01.50 </option>
                                    <option value="+01.75"> +01.75 </option>
                                    <option value="+02.00"> +02.00 </option>
                                    <option value="+02.25"> +02.25 </option>
                                    <option value="+02.50"> +02.50 </option>
                                    <option value="+02.75"> +02.75 </option>
                                    <option value="+03.00"> +03.00 </option>
                                    <option value="+03.25"> +03.25 </option>
                                    <option value="+03.50"> +03.50 </option>
                                    <option value="+03.75"> +03.75 </option>
                                    <option value="+04.00"> +04.00 </option>
                                </select>

                            </td>


                        </tr>


                        <?php include('add_iteam.php'); ?>


                        <tr>
                            <th collspan=2;>
                                <input class="form-control" type="submit" name="addnew" width="100%">
                            </th>
                        </tr>
                    </form>
                </tbody>
            </table>


        </div>
    </div>

    <script>
    // select lens type   funtion 
    // 
    function lens_type_view_fun() {
        var selectl = document.getElementById('lens_type');
        var optionl = selectl.options[selectl.selectedIndex];
        if (optionl.value == "Rl") {
            document.getElementById('rady_lens').style.display = "block";
            document.getElementById('lens_power').style.display = "block";
            document.getElementById('singl_lens').style.display = "block";
            document.getElementById('lab_lens').style.display = "none";
            document.getElementById('singl_duble_lens').style.display = "none";
            //   document.getElementById('lens_base').style.display = "none"; 

        } else if (optionl.value == "XR") {
            document.getElementById('lab_lens').style.display = "block";
            document.getElementById('singl_duble_lens').style.display = "block";
            //   
            document.getElementById('rady_lens').style.display = "none";
            document.getElementById('lens_power').style.display = "none";
            document.getElementById('singl_lens').style.display = "none";


        } else {
            document.getElementById('rady_lens').style.display = "none";
            document.getElementById('lab_lens').style.display = "none";
            document.getElementById('lens_power').style.display = "none";
            document.getElementById('singl_lens').style.display = "none";
            document.getElementById('singl_duble_lens').style.display = "none";
            //   document.getElementById('lens_base').style.display = "none"; 
        }
    }
    lens_type_view_fun()


    // document.getElementById('control_EMAIL').readOnly = true;

    function OpenWindow_brand() {
        window.open('index.php?page=add_brand',
            'newwindow',
            config =
            'height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no'
        );
    }

    function OpenWindow_lens_type() {
        window.open('index.php?page=lens_type',
            'newwindow',
            config =
            'height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no'
        );
    }

    function OpenWindow_newcompany() {
        window.open('index.php?page=add_company',
            'newwindow',
            config =
            'height=670,width=500,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no'
        );
    }
    </script>
    <script>
    function duble_lens_fun() {
        var selectl = document.getElementById('singl_duble_lens');
        var optionl = selectl.options[selectl.selectedIndex];
        if (optionl.value == "duble_lens") {
            document.getElementById('lens_base').style.display = "block";
            document.getElementById('lens_add').style.display = "block";
            document.getElementById('base_R_L').style.display = "block";


        } else if (optionl.value == "singl_lens") {
            document.getElementById('lens_base').style.display = "block";
            document.getElementById('lens_add').style.display = "none";
            document.getElementById('base_R_L').style.display = "none";
        } else {
            document.getElementById('lens_add').style.display = "none";
            document.getElementById('lens_base').style.display = "none";
            document.getElementById('base_R_L').style.display = "none";

        }

    }
    duble_lens_fun()
    </script>


<?php
if (isset($_POST["brand_name"])) {
   
  echo   $brand_name = substr($_POST['brand_name'], 0, -4);
  echo "<br>";
  echo   $brandid = substr($_POST['brand_name'], -4);
}
if (isset($_POST["company_id_name"])){
  echo "<br>";
  echo  $combany_name = substr($_POST['company_id_name'], 0, -4);
  echo  $combany_id = substr($_POST['company_id_name'], -4);
}