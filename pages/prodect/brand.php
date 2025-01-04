<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../html/icon.html'); ?>

</head>

<body>
    <?php include('../html/nav.html');
    require_once '../php/dps.php';

    $cheak = $databass->prepare(" SELECT * FROM `users` WHERE ROEL='Agent' ");
    // $cheak->bindParam('ROEL', );
    $cheak->execute();
    ?>

    <div style="overflow:auto">
        <div class="menu">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
        </div>

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

                        <!-- <tr>
                            <th class="table-primary">Tybe </th>
                            <td> <input class="form-control" name="type" type="text"> </td>
                        </tr> -->
                        <tr>
                            <td colspan="2"> <button name="new_brand" class="form-control btn btn-info" type="submit">Add New  Brand</button></td>
                        </tr>
                    </form>
                    
                    <?php include('../api/newbrand.php'); ?>
                </tbody>

            </table>
        </div>

    </div>





</body>

</html>

<?php include('../html/footer.html'); ?> 


<script src="prodect/additeam.js"></script>
