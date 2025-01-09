<?php
require_once 'config.php';
// $company_lens = $databass->prepare("SELECT DISTINCT * FROM `company` WHERE ROEL='Agent' AND (cotegray ='lens' OR cotegray='all')");
// $company_lens->execute();

// $company_frame = $databass->prepare("SELECT DISTINCT * FROM `company` WHERE ROEL='Agent' AND (cotegray ='fram' OR cotegray='all')");
// $company_frame->execute();

$brand_lens = $databass->prepare("SELECT DISTINCT * FROM `brand` WHERE `type`='lens'");
$brand_lens->execute();

$brand_frame = $databass->prepare("SELECT DISTINCT * FROM `brand` WHERE `type`='fram'");
$brand_frame->execute();


?>


<style>
    .card {
        margin-bottom: 20px;
    }

    .form-control {
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title">Add New Product</h5>
        </div>
        <div class="card-body">
            <form id="productForm" method="POST">
                <!-- Select Item Type -->
                <div class="form-group">
                    <label for="PRODECT">Select Item Type</label>
                    <select class="form-control" name="PRODECT" id="PRODECT" onchange="brand_fun()">
                        <option value="">Select</option>
                        <option value="frame">Frame</option>
                        <option value="lens">Lens</option>
                        <option value="contc_Lens">Contact Lens</option>
                        <option value="parts">Parts</option>
                        <option value="Machien">Machine</option>
                    </select>
                </div>

                <!-- Brand Names -->
                <div class="form-group">

                    <div class="input-group-append">
                        <label for="brand_name">Brand</label>
                        <button type="button" class="btn btn-outline-secondary" onclick="add_brand()">New Brand</button>
                    </div>
                    <select class="form-control" name="brand_name" id="brand_frame" style="display:none">
                        <option value="">Select Brand</option>
                        <?php

                        foreach ($brand_frame as $view_fram): ?>
                            <option value="<?php echo $view_fram['name'] . $view_fram['id']; ?>">
                                <?php echo $view_fram['name']; ?>
                            </option>
                        <?php endforeach; ?>
                        <button type="button" class="btn btn-secondary mt-2" onclick="OpenWindow_brand()">New
                            Brand</button>
                    </select>

                    <div id="brand_lens" style="display:none">
                    <select class="form-control" name="brand_name" >
                        <option value="">Select Brand</option>
                        <?php

                        foreach ($brand_lens as $view_lens): ?>
                            <option value="<?php echo $view_lens['name'] . $view_lens['id']; ?>">
                                <?php echo $view_lens['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php include('lens_diteals.php'); ?>
                    </div>
                  </div>

                <!-- Add Item Information -->
                <?php include('add_iteam.php'); ?>

                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" name="addnew" class="btn btn-primary btn-block" value="Add New Product">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        // منع الإرسال الافتراضي وجمع البيانات
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault(); // منع الإرسال الافتراضي

            // جمع بيانات الفورم
            const formData = new FormData(event.target);
            const formObject = {};

            // تحويل FormData إلى كائن
            formData.forEach((value, key) => {
                formObject[key] = value;
            });


            
            fetch('api/add_product.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formObject, null, 2)
            })
            .then(response => response.json())
            .then(result => {
                console.log(result.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });
                        // عرض البيانات

            console.log(JSON.stringify(formObject, null, 2));


        });

    function brand_fun() {
        var selectl = document.getElementById('PRODECT');
        var optionl = selectl.options[selectl.selectedIndex].value;
        if (optionl === "frame") {
            document.getElementById('brand_frame').style.display = "block";
            document.getElementById('brand_lens').style.display = "none";
        } else if (optionl === "lens") {
            document.getElementById('brand_frame').style.display = "none";
            document.getElementById('brand_lens').style.display = "block";
        } else {
            document.getElementById('brand_frame').style.display = "none";

            document.getElementById('brand_lens').style.display = "none";
        }
    }

    function add_brand() {
        // يمكنك إضافة وظيفة لفتح نافذة جديدة لإضافة علامة تجارية جديدة
        window.open('index.php?page=add_brand', '_blank', 'width=600,height=400');
    }

    function add_company() {
        // يمكنك إضافة وظيفة لفتح نافذة جديدة لإضافة علامة تجارية جديدة
        window.open('index.php?page=add_company', '_blank', 'width=600,height=400');
    }

    brand_fun()
</script>
