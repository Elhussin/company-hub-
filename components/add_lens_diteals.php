<?php
require_once 'config.php';

$coatings = [
    "NOR" => "NOR", "MC" => "MC", "Color" => "Color",
    "TRN Brown" => "TRN Brown", "TRN Gray" => "TRN Gray",
    "Blue Ray" => "Blue Ray", "UV" => "UV", "Polarid" => "Polarid",
    "POLY Carbon" => "POLY Carbon", "Single Vision" => "Single Vision",
    "Bifocal" => "Bifocal", "Multi Focal" => "Multi Focal"
];
?>
        <div class="card">
            <div class="card-header  bg-info">
                <h5 class="card-title mb-0">Lens Details</h5>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
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
                                            <!-- استبدال المسافات بـ _ لتحويل المعرف إلى صيغة مناسبة -->
                                            <input class="form-check-input" type="checkbox" name="type[]" id="type_<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>">
                                            <label class="form-check-label" for="type_<?php echo strtolower(str_replace(' ', '_', $key)); ?>"><?php echo $value; ?></label>
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

            </div>
        </div>
 
    <!-- <script src="static/script/additeam.js"></script> -->
