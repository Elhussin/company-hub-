<div class="container min-vh-100 mt-5">
<?php
include_once 'config.php';

if (isset($_GET['imgid'])) {
    $id = $_GET['imgid'];

    try {
        // جلب اسم الملف لحذفه من المجلد
        $stmt = $databass->prepare("SELECT file_name FROM `images` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $imageName = $row['file_name'];

            // حذف الصورة من قاعدة البيانات
            $stmt = $databass->prepare("DELETE FROM `images` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // حذف الملف من المجلد
            $filePath = 'media/' . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // عرض تنبيه وإعادة التوجيه
            echo "<script>
                alert('Image deleted successfully');
                window.location.href = 'index.php?page=view_imgs';
            </script>";
        } else {
            echo "<script>alert('Image not found');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Cannot delete image: " . addslashes($e->getMessage()) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request');</script>";
}
?>

</div>