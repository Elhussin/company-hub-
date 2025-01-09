
        <div class="main">

            <table class="table table-borderless">
                <!--  main table head    Add new Brodect </th> -->
                <thead>
                    <!--   company  -->


                    <tr>
                        <th colspan="2" style="text-align:center" class="table-dark" class="table-primary" scope="col">
                            Add new Brodect </th>
                    </tr>
                </thead>

                <!-- main  table body  -->
                <tbody>
                    <form action="" method="POST">
                        <!-- Slect main iteam Type -->
                        <tr>

                            <th class="table-primary">Slect iteam Type</th>
                            <td>
                                <select class="form-control" name="PRODECT" id="PRODECT" onchange="brand_fun()" >
                                    <option>select </option>
                                    <option value="frame">Frame </option>
                                    <option value="lens">Lens</option>
                                    <option value="contc_Lens">contc Lens</option>
                                    <option value="parts">parts</option>
                                    <option value="Machien">Machien</option>

                                </select>
                            </td>
                        </tr>


                        <!-- compay nams -->
                        <tr>
                            <th class="table-primary"> Company</th>

                            <td>

                                <!--  copmany for fram  -->
                                <select class="form-control" name="company_id_name" id="company_lens"
                                    style="display:none">
                                    <option value=""></option>
                                    <?php
                        require_once '../php/dps.php';

                        $company_lens = $databass->prepare(" SELECT DISTINCT * FROM `users` WHERE ROEL='Agent' AND  cotegray ='lens'  or cotegray='all' ");
                        $company_lens->execute();

                        foreach ($company_lens as $view_C_len) {

                            // echo '<option value="' .$view["ID"] . '" > ' . $view["ID"] . '-' . $view["NAME"] . '</option>';
                            echo '<option value="' . $view_C_len["NAME"] . $view_C_len["ID"] . '" > ' . $view_C_len["NAME"] . '</option>';
                        }
                        // echo '<option value="' . $view["NAME"] . $view["ID"] . '" > ' . $view["ID"] . '-' . $view["NAME"] . '</option>';

                        ?>
                                    <!--   copmany for e lens  -->
                                </select>


                                <select class="form-control" name="company_id_name" id="company_frame"
                                    style="display:none">
                                    <option value=""></option>
                                    <?php
                        require_once '../php/dps.php';

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
                        <!-- <tr>
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
                        </tr> -->

                        
                        <!--    add item iformatioan  -->
                        <?php include('add_iteam.php'); ?>
                        <!--  submit button   -->
                        <tr>
                            <th></th>
                            <th collspan=3;>
                                <input class="form-control" type="submit" name="addnew" width="100%">
                            </th>
                        </tr>


                    </form>
                </tbody>
            </table>

        </div>
    </div>


    <?php include('../html/footer.html') ?>
</body>
<!-- <script src="prodect/additeam.js"></script> -->


</html>
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
            // document.getElementById('brand_frame').style.display = "none";
            // document.getElementById('fram_type').style.display = "none";
            // document.getElementById('company_frame').style.display = "none";
            // document.getElementById('company_lens').style.display = "none";
            // document.getElementById('brand_lens').style.display = "none";
            // document.getElementById('lens_type').style.display = "none";

        }
    }
    
    brand_fun();

</script>