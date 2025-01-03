<div class="container-fluid" style="overflow:auto">
    <div class="row">
        <!-- بطاقة لكل رابط -->
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a class="btn btn-warning w-100" href="admin/admin.php">Admin</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a class="btn btn-warning w-100" href="check_box.php">Check Box</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a class="btn btn-warning w-100" href="home.php">Home</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a class="btn btn-warning w-100" href="tray.php">Tray</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a class="btn btn-warning w-100" href="view.php">View</a>
                </div>
            </div>
        </div>
        <!-- Add more cards for each link -->

        <!-- Example Cards for Other Content -->
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="img/coustmer.png" class="card-img-top" alt="..." style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Customer Management</h5>
                    <p class="card-text">Manage customer data efficiently.</p>
                    <a class="btn btn-info w-100" href="coustmer/coustmer.php">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="img/uplod.png" class="card-img-top" alt="..." style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Upload File</h5>
                    <p class="card-text">Easily upload your documents.</p>
                    <a class="btn btn-info w-100" href="file/upload.php">Upload</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="img/user1.jpg" class="card-img-top" alt="..." style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">New User</h5>
                    <p class="card-text">Add a new user to the system.</p>
                    <a class="btn btn-info w-100" href="php/adduserform.php">Add User</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="img/uplod.png" class="card-img-top" alt="..." style="height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Update View</h5>
                    <p class="card-text">Update the main view seamlessly.</p>
                    <a class="btn btn-info w-100" href="file/viewcontorl.php">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// مصفوفة بيانات الكروت
$cards = [
    [
        'title' => 'Admin',
        'description' => 'Manage the admin panel and settings.',
        'link' => 'admin/admin.php',
        'image' => 'img/admin.png',
    ],
    [
        'title' => 'Check Box',
        'description' => 'View and manage checkboxes.',
        'link' => 'check_box.php',
        'image' => 'img/checkbox.png',
    ],
    [
        'title' => 'Home',
        'description' => 'Navigate to the home page.',
        'link' => 'home.php',
        'image' => 'img/home.png',
    ],
    [
        'title' => 'Tray',
        'description' => 'Manage trays and storage.',
        'link' => 'tray.php',
        'image' => 'img/tray.png',
    ],
    // أضف المزيد من الكروت هنا
];

// دالة لإنشاء الكروت
function renderCards($cards)
{
    foreach ($cards as $card) {
        echo '<div class="col">';
        echo '    <div class="card" style="width: 18rem;">';
        echo '        <img src="' . $card['image'] . '" class="card-img-top" alt="' . $card['title'] . '" style="height: 250px;">';
        echo '        <div class="card-body">';
        echo '            <h5 class="card-title">' . $card['title'] . '</h5>';
        echo '            <p class="card-text">' . $card['description'] . '</p>';
        echo '            <a class="btn btn-info" href="' . $card['link'] . '" class="btn btn-primary w-100">View</a>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
}
$data = json_decode(file_get_contents('pages/links.json'), true);
foreach ($data as $link) {
    echo '<a href="' . $link['url'] . '">' . $link['title'] . '</a><br>';
}

?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php renderCards($cards); ?>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <?php foreach ($data as $link): ?>
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title"><?= $link['title'] ?></h5>
                <a href="<?= $link['url'] ?>" class="btn btn-warning w-100"><?= $link['title'] ?></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>



<div class="container mt-5">
        <h2 class="text-center mb-4">Control Panel</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <!-- Loop Through Links -->
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Admin Panel</h5>
                        <a href="admin/admin.php" class="btn btn-warning w-100">Admin</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Checkbox</h5>
                        <a href="check_box.php" class="btn btn-warning w-100">Checkbox</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Home</h5>
                        <a href="home.php" class="btn btn-warning w-100">Home</a>
                    </div>
                </div>
            </div>
            <!-- Repeat Cards for Other Links -->
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->