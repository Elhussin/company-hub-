<?php
require_once '../config.php';

// تعريف المتغيرات لتخزين القيم التي سيتم استخدامها في الفلاتر
$select = isset($_GET['select']) ? $_GET['select'] : '';
$collection = isset($_GET['collection']) ? $_GET['collection'] : '';
$optian = isset($_GET['optian']) ? $_GET['optian'] : '';
$PRODECT = isset($_GET['PRODECT']) ? $_GET['PRODECT'] : '';

// بناء الاستعلام الأساسي
$query = "SELECT * FROM `prodect` WHERE 1";

// إضافة الشروط بناءً على القيم المستلمة
if ($select != '') {
    $query .= " AND (`collection_gendr` = :select OR `collection_gendr` = 'All')";
}


if ($collection != '') {
    $query .= " AND  (`collection` = :collection OR `collection` = 'All')";
}

if ($optian != '') {
    $query .= " AND (`optian` = :optian OR `optian` = 'All')";
}

if ($PRODECT != '') {
    $query .= " AND  (`PRODECT` = :PRODECT OR `PRODECT` = 'All')";
}

// تحضير الاستعلام
$stmt = $databass->prepare($query);

// ربط القيم بالاستعلام
if ($select != '') {
    // $stmt->bindValue(':select', '%' . $select . '%'); // استخدمنا `LIKE` مع النسبة المئوية لتوسيع البحث
    $stmt->bindValue(':select', $select);

}
if ($collection != '') {
    $stmt->bindValue(':collection', $collection);
}
if ($optian != '') {
    $stmt->bindValue(':optian', $optian);
}
if ($PRODECT != '') {
    $stmt->bindValue(':PRODECT', $PRODECT);
}

// تنفيذ الاستعلام
$stmt->execute();
$products = $stmt->fetchAll();

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
                            <p class="card-text"><strong>Model No</strong> '. htmlspecialchars($product['model']).'</p>
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