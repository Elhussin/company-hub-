<?php
require_once 'config.php';


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

<div class="container mt-5">
    <div id="statusMessage" class="mt-4"></div>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title" id="forn-title">Add New Product</h5>
        </div>
        <div class="card-body">
            <form id="productForm" method="POST">
                <!-- Select Item Type -->
                <div class="form-group">

                    <label for="PRODECT">Select Item Type</label>
                    <select class="form-control" name="PRODECT" id="PRODECT" onchange="fetchBrands()">
                        <option value="">select Type</option>
                        <option value="fram">Frame</option>
                        <option value="lens">Lens</option>
                        <option value="contc_Lens">Contact Lens</option>
                        <option value="parts">Parts</option>
                        <option value="Machien">Machine</option>
                    </select>

                    <div id="brand_container"></div> <!-- لتخزين النتائج هنا -->
                    <button class="btn btn-info" onclick="add_brand()">New Brand</button>
                    <!-- Lens Brands (Initially Hidden) -->
                    <div id="brand_lens" style="display:none">
                        <?php include('add_lens_diteals.php'); ?>
                    </div>
                </div>

                <!-- Add Item Information -->
                <?php include('add_iteam.php'); ?>

                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" name="addnew" id="send" class="btn btn-primary btn-block" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="static/script/add_prodect.js" ></script>
