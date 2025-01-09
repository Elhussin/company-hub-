
<div class="container min-vh-100 mt-5">
    <?php 
    require_once 'config.php';

    $cheak = $databass->prepare("SELECT * FROM `company` WHERE ROEL='Agent'");
    $cheak->execute();
    ?>

    <?php include 'api/add_brand.php' ?>

    <div id="alert"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Add New Brand</h5>
                    </div>
                    <div class="card-body">
                        <div><?php echo $meesage; ?></div>
                        <p id="alrt" class="text-center"></p>
                        <form action="" method="POST" id="add_new_company">
                            <div class="form-group">
                                <label for="company_id" class="font-weight-bold">Company</label>
                                <div class="input-group">
                                    <select class="form-control" name="company_id" id="company_id">
                                        <?php foreach ($cheak as $view): ?>
                                            <option value="<?php echo $view["id"]; ?>"><?php echo $view["name"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" onclick="OpenWindow_newcompany()">New Company</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand_name" class="font-weight-bold">Main Name</label>
                                <input class="form-control" name="brand_name" id="brand_name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="brand_name_s" class="font-weight-bold">Type</label>
                                <select class="form-control" name="brand_name_s" id="brand_name_s">
                                    <option value="fram">Frame</option>
                                    <option value="lens">Lens</option>
                                    <option value="exa">OTHER</option>
                                    <option value="all">ALL</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button name="new_brand" class="btn btn-info btn-block" type="submit">Add New Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="static/script/additeam.js"></script>


</div>