



<?php
// قراءة ملف JSON
$options = $databass->query("SELECT * FROM view")->fetchAll(PDO::FETCH_ASSOC);
$jsonData = file_get_contents('view.json');
$data = json_decode($jsonData, true);

// إذا لم يتم تحميل البيانات، استخدم قيم افتراضية
if (empty($data['sections'])) {
    $data['sections'] = [
        [
            "id" => "img1",
            "type" => "Booster",
            "title" => "Booster 1",
            "description" => "This is the default description for Booster 1.",
            "image" => "images/default.jpg"
        ],
        [
            "id" => "img2",
            "type" => "Booster",
            "title" => "Booster 2",
            "description" => "This is the default description for Booster 2.",
            "image" => "images/default.jpg"
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section {
            padding: 50px 0;
            text-align: center;
        }
        .section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .section h2 {
            margin-top: 20px;
            font-size: 2.5rem;
        }
        .section p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($data['sections'] as $section): ?>
            <div class="section" id="<?= $section['id'] ?>">
                <img src="<?= $section['image'] ?>" alt="<?= $section['title'] ?>">
                <h2><?= $section['title'] ?></h2>
                <p><?= $section['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true); // تحويل JSON إلى مصفوفة

print_r($data); // عرض البيانات
?>