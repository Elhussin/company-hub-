
    <?php 
    require_once 'config.php';

    $cheak = $databass->prepare(" SELECT * FROM `company` WHERE ROEL='Agent' ");
    // $cheak->bindParam('ROEL', );
    $cheak->execute();
    ?><?php include 'api/add_brand.php' ?>


        <div id="alert"></div>
        <div style="margin:auto;" class="form-group row  main">
            <div><?php echo $meesage; ?></div>
            <p style="margin:auto; margin-top:5px;" id="alrt"></p>
            <table class="table table-borderless">
                <thead></thead>
                <tbody>
                    <form action="" method="POST" id="add_new_company">
                        <tr>
                            <th class="table-primary"> Company</th>
                            <td>
                                <select class="form-control" name="company_id" id="company_id">
                                 
                                    <?php
                                
                                    foreach ($cheak as $view) {

                                        echo '<option value="' . $view["ID"] . '" > ' . $view["NAME"] . '</option>';
                                    }

                                    ?>
                                </select>
                                <input type="button" value=" new company" onclick="OpenWindow_newcompany()">

                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Main Name </th>
                            <td> <input class="form-control" name="brand_name" id="brand_name" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">Tybe</th>
                            <td>  <select class="form-control" name="brand_name_s" id="brand_name_s">
                                <option value="frame">Frame</option>
                                <option value="lens">Lens</option>
                                <option value="exa">OTHER</option>

                            </select>
                           
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2"> <button name="new_brand" class="form-control btn btn-info" type="submit">Add New  Brand</button></td>
                        </tr>
                    </form>
                    

                </tbody>

            </table>
        </div>

    </div>



<script src="components/additeam.js"></script>
