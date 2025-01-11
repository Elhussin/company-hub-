<?php
header("Content-Type: application/json");

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $id = $_GET['id'] ?? null;

        // الحقول الحالية
        $PRODECT = $_POST['PRODECT'] ?? null;
        $brand_id = $_POST['brand_id'] ?? null;
        $cotger = $_POST['cotger'] ?? null;
        $typelens = $_POST['typelens'] ?? null;
        $index = $_POST['index'] ?? null;
        $type = isset($_POST['type']) ? json_encode($_POST['type']) : null;
        $Special = $_POST['Special'] ?? null;
        $model = $_POST['model'] ?? null;
        $made_year = $_POST['made_year'] ?? null;
        $color = $_POST['color'] ?? null;
        $lens = $_POST['lens'] ?? null;
        $arm = $_POST['arm'] ?? null;
        $bridg = $_POST['bridg'] ?? null;
        $cost = $_POST['cost'] ?? null;
        $ratel = $_POST['ratel'] ?? null;
        $discon = $_POST['discon'] ?? null;
        $tax = $_POST['tax'] ?? null;
        $final = $_POST['final'] ?? null;
        $count = $_POST['count'] ?? null;
        $madein = $_POST['madein'] ?? null;
        $descrip = $_POST['descrip'] ?? null;

        // الحقول الجديدة
        $collection_gendr = $_POST['collection_gendr'] ?? null;
        $collection = $_POST['collection'] ?? null;
        $optian = $_POST['optian'] ?? null;

        // تحقق من وجود id صالح
        if (empty($id) || !is_numeric($id)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or missing id']);
            exit();
        }

        // تحقق من وجود المنتج
        $checkSql = "SELECT COUNT(*) FROM prodect WHERE id = :id";
        $checkStmt = $databass->prepare($checkSql);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        if ($checkStmt->fetchColumn() == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
            exit();
        }

        // استعلام التحديث
        $sql = "UPDATE prodect SET
            PRODECT = :PRODECT,
            brand_id = :brand_id,
            cotger = :cotger,
            typelens = :typelens,
            `index` = :index,
            type = :type,
            Special = :Special,
            model = :model,
            made_year = :made_year,
            color = :color,
            lens = :lens,
            arm = :arm,
            bridg = :bridg,
            cost = :cost,
            ratel = :ratel,
            discon = :discon,
            tax = :tax,
            final = :final,
            `count` = :count,
            madein = :madein,
            descrip = :descrip,
            collection_gendr = :collection_gendr,
            collection = :collection,
            optian = :optian
        WHERE id = :id";

        $stmt = $databass->prepare($sql);

        // ربط القيم
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':PRODECT', $PRODECT);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':cotger', $cotger);
        $stmt->bindParam(':typelens', $typelens);
        $stmt->bindParam(':index', $index);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':Special', $Special);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':made_year', $made_year);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':lens', $lens);
        $stmt->bindParam(':arm', $arm);
        $stmt->bindParam(':bridg', $bridg);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':ratel', $ratel);
        $stmt->bindParam(':discon', $discon);
        $stmt->bindParam(':tax', $tax);
        $stmt->bindParam(':final', $final);
        $stmt->bindParam(':count', $count);
        $stmt->bindParam(':madein', $madein);
        $stmt->bindParam(':descrip', $descrip);
        $stmt->bindParam(':collection_gendr', $collection_gendr);
        $stmt->bindParam(':collection', $collection);
        $stmt->bindParam(':optian', $optian);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Product updated successfully']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not update product']);
            exit();
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
?>
