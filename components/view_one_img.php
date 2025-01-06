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
            $imageURL = 'components/uploads/' . $row["file_name"];
            echo '

                <div class="container mt-5">
                    <div class="text-center">
                        <img src="' . $imageURL . '" class="img-fluid" alt="Image">
                        <a href="index.php?page=viewimg" class="btn btn-secondary">Back to Gallery</a>

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