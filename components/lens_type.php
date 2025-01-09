<?php
require_once 'config.php';

// Fetch companies data
$companys = $databass->prepare("SELECT DISTINCT * FROM `company` WHERE ROEL='Agent' AND (cotegray='lens' OR cotegray='all')");
$companys->execute();
$coatings = [
    "NOR" => "NOR", "MC" => "MC", "Color" => "Color",
    "TRN_brown" => "TRN Brown", "TRN_Gray" => "TRN Gray",
    "blue" => "Blue Ray", "UV" => "UV", "Bolarid" => "Polarid",
    "POLY" => "POLY Carbon", "singl" => "Single Vision",
    "Bifocal" => "Bifocal", "Multi" => "Multi Focal"
];
// Fetch brands data
$cheak_brand = $databass->prepare("SELECT DISTINCT * FROM `brand` WHERE `type`='lens'");
$cheak_brand->execute();
?>
    <style>
        .card {
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .form-check-inline {
            margin-right: 15px;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Add New Lens Type</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" id="add_new_company">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <div class="form-group mb-3">
                                <label for="company_id" class="form-label">Company</label>
                                <select class="form-control" name="company_id" id="company_id">
                                    <?php foreach ($companys as $view): ?>
                                        <option value="<?php echo $view["name"] . $view["id"]; ?>">
                                            <?php echo $view["id"] . '-' . $view["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="button" class="btn btn-secondary mt-2" onclick="OpenWindow_newcompany()">New Company</button>
                            </div> -->

                            <div class="form-group mb-3">
                                <label for="brand_name" class="form-label">Brand</label>
                                <select class="form-control" name="brand_name" id="brand_name">
                                    <?php foreach ($cheak_brand as $view): ?>
                                        <option value="<?php echo $view["name"] . $view["id"]; ?>">
                                            <?php echo $view["company_id"] . '-' . $view["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="button" class="btn btn-secondary mt-2" onclick="OpenWindow_brand()">New Brand</button>
                            </div>

                            <div class="form-group mb-3">
                                <label for="cotger" class="form-label">Category</label>
                                <select class="form-control" name="cotger" id="cotger">
                                    <option value="1">Ready</option>
                                    <option value="2">Lab</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="typelens" class="form-label">Type</label>
                                <select class="form-control" name="typelens" id="typelens">
                                    <option value="3">Plastic</option>
                                    <option value="4">Glass</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="index" class="form-label">Refractive Index</label>
                                <select class="form-control" name="index" id="index">
                                    <option value="5">1.50</option>
                                    <option value="6">1.56</option>
                                    <option value="7">1.60</option>
                                    <option value="8">1.67</option>
                                    <option value="9">1.74</option>
                                    <option value="11">1.76</option>
                                    <option value="12">1.80</option>
                                    <option value="13">1.90</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Coatings</label>
                                <div>
                                    <?php

                                    foreach ($coatings as $key => $value): ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="type[]" id="<?php echo $key; ?>" value="<?php echo $value; ?>">
                                            <label class="form-check-label" for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Special" class="form-label">Special Type</label>
                                <input class="form-control" type="text" name="Special" id="Special">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="new_type">Add New Lens Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="static/script/additeam.js"></script>
