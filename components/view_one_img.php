<div class=" min-vh-100 ">
<?php
include_once 'config.php';

if (isset($_GET['imgid'])) {
    $id = $_GET['imgid'];

    try {
        // جلب بيانات الصورة من قاعدة البيانات
        $stmt = $databass->prepare("SELECT * FROM `images` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $imageURL = 'media/' . $row["file_name"];
            echo '
                <div class="container mt-5">
                <!-- زر العودة -->
                    <div class="text-center">

                        <!-- عرض الصورة بحجم أكبر -->
                        <img src="' . $imageURL . '" class="img-fluid rounded shadow-lg" style="max-width: 80%; height: auto;" alt="Image">
                        
                        <!-- عرض العنوان والوصف -->
                        <div class="mt-4">
                            <h3 class="card-title">' . htmlspecialchars($row["name"]) . '</h3>
                            <p class="card-text lead">' . htmlspecialchars($row["description"]) . '</p>
                        </div>
                        <div class="mt-4">
                        <a href="index.php?page=view_imgs" class="btn btn-secondary">Back to Gallery</a>
                    </div>
                    
                    </div>
                </div>

            ';
        } else {
            echo "Image not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
</div>