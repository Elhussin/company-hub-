<?php
require_once '../config.php';

// جلب جميع المنتجات
$query = "SELECT * FROM `prodect`";
$products = $databass->query($query)->fetchAll();

 if ($products){


    echo '<div class="container min-vh-100">
        <div class="row">';

             foreach ($products as $product){

    
                echo '<div class="col-md-4 mb-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'. htmlspecialchars($product['PRODECT']).'</h5>
                            <p class="card-text"><strong>Brand:</strong>'. htmlspecialchars($product['brand_id']).'</p>
                            <p class="card-text"><strong>Type:</strong> '. htmlspecialchars($product['cotger']).'</p>
                            <p class="card-text"><strong>Cost Price:</strong> '. htmlspecialchars($product['cost']).'$</p>
                            <p class="card-text"><strong>Retial Price:</strong> '. htmlspecialchars($product['ratel']).'$</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary" onclick="editProduct('.$product['id'].')">Edit</button>
                                <button class="btn btn-danger" onclick="deleteProduct('. $product['id'].')">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            echo '
        </div>
    </div>';
}else{
    echo' <div class="container">
    <p class="text-center">No products found.</p>
</div>';

}
