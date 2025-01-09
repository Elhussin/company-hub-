<?php
header("Content-Type: application/json");

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
require_once '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // التحقق من وجود البيانات
        $PRODECT = $_POST['PRODECT'] ?? null;
        $brand_id = $_POST['brand_id'];
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

        if (empty($brand_id) || !is_numeric($brand_id)) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'Invalid brand_id: ' . $brand_id
            ]);
            exit;
        }
        
        // إعداد الاستعلام
        $sql = "INSERT INTO prodect (
            PRODECT, brand_id, cotger, typelens, `index`, type, Special, model, made_year, color, lens, arm, bridg, cost, ratel, discon, tax, final, `count`, madein, descrip
        ) VALUES (
            :PRODECT, :brand_id, :cotger, :typelens, :index, :type, :Special, :model, :made_year, :color, :lens, :arm, :bridg, :cost, :ratel, :discon, :tax, :final, :count, :madein, :descrip
        )";

        $stmt = $databass->prepare($sql);
        // ربط القيم
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

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Could not save data']);
            exit();
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo json_encode(['status' => 'error', 'message' => 'This element already exists']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            exit();
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
?>
