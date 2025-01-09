<?php
header("Content-Type: application/json");
require_once 'config.php';
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
// جلب البيانات المرسلة من الفورم
$data = json_decode(file_get_contents("php://input"), true);

// التحقق من وجود البيانات
if (!empty($data)) {
    try {
        // استخراج البيانات
        $PRODECT = $data['PRODECT'];
        $brand_id = $data['brand_id']; // تم تغيير brand_name إلى brand_id
        $cotger = $data['cotger'];
        $typelens = $data['typelens'];
        $index = $data['index'];
        $type = json_encode($data['type']);
        $Special = $data['Special'];
        $model = $data['model'];
        $made_year = $data['made_year'];
        $color = $data['color'];
        $lens = $data['lens'];
        $arm = $data['arm'];
        $bridg = $data['bridg'];
        $cost = $data['cost'];
        $ratel = $data['ratel'];
        $discon = $data['discon'];
        $tax = $data['tax'];
        $final = $data['final'];
        $datein = $data['datein'];
        $count = $data['count'];
        $madein = $data['madein'];
        $descrip = $data['descrip'];

        // إعداد الاستعلام
        $sql = "INSERT INTO prodect (
            PRODECT, brand_id, cotger, typelens, `index`, type, Special, model, made_year, color, lens, arm, bridg, cost, ratel, discon, tax, final, datein, `count`, madein, descrip
        ) VALUES (
            :PRODECT, :brand_id, :cotger, :typelens, :index, :type, :Special, :model, :made_year, :color, :lens, :arm, :bridg, :cost, :ratel, :discon, :tax, :final, :datein, :count, :madein, :descrip
        )";

        $stmt = $databass->prepare($sql);

        // ربط القيم
        $stmt->bindParam(':PRODECT', $PRODECT);
        $stmt->bindParam(':brand_id', $brand_id); // تم تغيير brand_name إلى brand_id
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
        $stmt->bindParam(':datein', $datein);
        $stmt->bindParam(':count', $count);
        $stmt->bindParam(':madein', $madein);
        $stmt->bindParam(':descrip', $descrip);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            echo json_encode(["message" => "تمت إضافة المنتج بنجاح!"]);
        } else {
            echo json_encode(["message" => "فشل في إضافة المنتج."]);
        }
    } catch (PDOException $e) {
        // في حالة وجود خطأ (مثل تكرار المنتج)
        if ($e->getCode() == 23000) { // 23000 هو كود خطأ التكرار في MySQL
            echo json_encode(["message" => "المنتج موجود مسبقًا!"]);
        } else {
            echo json_encode(["message" => "حدث خطأ: " . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(["message" => "لم يتم استلام أي بيانات."]);
}
?>