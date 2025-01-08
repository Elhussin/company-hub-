<div class="container min-vh-100 mt-5">
<?php
include_once 'config.php';

if (isset($_GET['userid'])) {
    $id = $_GET['userid'];

    try {
        // جلب اسم الملف لحذفه من المجلد
        $stmt = $databass->prepare("SELECT * FROM `users` WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $NAME = $row['NAME'];

            // حذف الصورة من قاعدة البيانات
            $stmt = $databass->prepare("DELETE FROM `images` WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // عرض تنبيه وإعادة التوجيه
            echo "<script>
                alert('Image deleted successfully');
                window.location.href = 'index.php?page=viewimg';
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