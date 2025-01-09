<?php
require_once 'config.php';

$coatings = [
    "NOR" => "NOR", "MC" => "MC", "Color" => "Color",
    "TRN_brown" => "TRN Brown", "TRN_Gray" => "TRN Gray",
    "blue" => "Blue Ray", "UV" => "UV", "Bolarid" => "Polarid",
    "POLY" => "POLY Carbon", "singl" => "Single Vision",
    "Bifocal" => "Bifocal", "Multi" => "Multi Focal"
];
// Fetch companies data
$companys = $databass->prepare("SELECT DISTINCT * FROM `company` WHERE ROEL='Agent' AND (cotegray='lens' OR cotegray='all')");
$companys->execute();

// Fetch brands data
$cheak_brand = $databass->prepare("SELECT DISTINCT * FROM `brand` WHERE `type`='lens'");
$cheak_brand->execute();

$message = '';

if (isset($_POST["new_type"])) {
    // Process selected coatings
    $acoted = $_POST['type'] ?? [];
    $cotd_descrip = '';

    if (!empty($acoted)) {
        $cotd_descrip = implode("-", $acoted);
    }

    // Process category
    $cotger = '';
    if ($_POST["cotger"] == 1) {
        $cotger = "Rl";
    } elseif ($_POST["cotger"] == 2) {
        $cotger = "XR";
    }

    // Process lens type
    $typelens = '';
    if ($_POST["typelens"] == 3) {
        $typelens = "PL";
    } elseif ($_POST["typelens"] == 4) {
        $typelens = "GL";
    }

    // Process refractive index
    $INDEX = '';
    switch ($_POST["index"]) {
        case 5: $INDEX = "1.50"; break;
        case 6: $INDEX = "1.56"; break;
        case 7: $INDEX = "1.60"; break;
        case 8: $INDEX = "1.67"; break;
        case 9: $INDEX = "1.74"; break;
        case 11: $INDEX = "1.76"; break;
        case 12: $INDEX = "1.80"; break;
        case 13: $INDEX = "1.90"; break;
    }

    // Process special type
    $Special = $_POST["Special"] ?? '';

    // Extract brand and company details
    $brand_name = substr($_POST['brand_name'], 0, -4);
    $brandid = substr($_POST['brand_name'], -4);
    $combany_name = substr($_POST['company_id'], 0, -4);
    $combany_id = substr($_POST['company_id'], -4);

    // Generate description and type code
    $descrip = $combany_name . '-' . $cotger . "-" . $typelens . "-" . $INDEX . '-' . $cotd_descrip . $Special;
    $type1 = implode("", $acoted);
    $type2 = $_POST['cotger'] . $_POST['typelens'] . $_POST['index'] . $type1 . $Special;

    // Check if the type already exists
    $cheakbrand = $databass->prepare("SELECT DISTINCT `type` FROM `prodect` WHERE type = :type");
    $cheakbrand->bindParam(':type', $type2);
    $cheakbrand->execute();

    if ($cheakbrand->rowCount() > 0) {
        $message = '<p class="alert alert-danger" role="alert">This type has already been added.</p>';
    } else {
        // Insert new product
        $addbrand = $databass->prepare("INSERT INTO `prodect` (`brand`, `name_s`, `type`, `lens_type`, `lens_cotger`, `lens_index`, `lens_cotd`, `companyID`, `brand_id`, `comapny`, `descrip`) 
                                       VALUES (:brand, :name_s, :type1, :typelens, :cotger, :lens_index, :cotd, :companyID, :brand_id, :comapny, :descrip)");
        $addbrand->bindParam('brand', $brand_name);
        $addbrand->bindParam('name_s', $_POST['lens_type']);
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
            $message = '<p class="alert alert-success" role="alert">New lens type added successfully!</p>';
        } else {
            $message = '<p class="alert alert-danger" role="alert">Error adding new lens type.</p>';
        }
    }
}
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
                <?php echo $message; ?>
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
                                    <option value="5">1.5</option>
                                    <option value="6">1.56</option>
                                    <option value="7">1.6</option>
                                    <option value="8">1.67</option>
                                    <option value="9">1.74</option>
                                    <option value="11">1.76</option>
                                    <option value="12">1.8</option>
                                    <option value="13">1.9</option>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>