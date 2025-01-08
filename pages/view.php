<?php
require_once '../config.php'; // تأكد من تضمين ملف الاتصال بقاعدة البيانات

try {
    // جلب البيانات من جدول view
    $options = $databass->query("SELECT * FROM view")->fetchAll(PDO::FETCH_ASSOC);

    // تحويل البيانات إلى تنسيق JSON
    $jsonData = json_encode($options, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // حفظ البيانات في ملف JSON
    $filePath = 'data.json'; // مسار الملف
    if (file_put_contents($filePath, $jsonData)) {
        echo "تم حفظ البيانات في ملف JSON بنجاح: " . $filePath;
    } else {
        echo "حدث خطأ أثناء حفظ البيانات في ملف JSON.";
    }
} catch (PDOException $e) {
    echo "حدث خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .poster {
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 15px;
        }
        .section-title {
            text-align: center;
            margin: 20px 0;
        }
        .product-card img {
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Posters Section -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div id="poster1" class="poster"></div>
            </div>
            <div class="col-md-4">
                <div id="poster2" class="poster"></div>
            </div>
            <div class="col-md-4">
                <div id="poster3" class="poster"></div>
            </div>
        </div>

        <!-- Products Section -->
        <h2 class="section-title">Our Products</h2>
        <div id="products" class="row"></div>

        <!-- Ideas Section -->
        <h2 class="section-title">Our Ideas</h2>
        <div id="ideas" class="row"></div>

        <!-- Education Section -->
        <h2 class="section-title">Educational Content</h2>
        <div id="education" class="row"></div>
    </div>

    <script>
        // JSON data (this will usually be fetched from an API)
        const data = [
            { "id": "2", "imgid": "15", "title": "Main", "post": "Page", "name": "../media/icon.jpg", "created_at": "2025-01-08 17:21:32" },
            { "id": "3", "imgid": "15", "title": "Second", "post": "Day", "name": "../media/icon.jpg", "created_at": "2025-01-08 17:32:18" },
            { "id": "5", "imgid": "img3", "title": "Product 1", "post": "Great Product", "name": "media/coustmer.png", "created_at": "2025-01-08 20:38:23" },
            { "id": "6", "imgid": "16", "title": "Product 2", "post": "Another Product", "name": "media/images.jpg", "created_at": "2025-01-08 20:39:49" }
        ];

        // Populate Posters
        document.getElementById("poster1").style.backgroundImage = `url('${data[0].name}')`;
        document.getElementById("poster2").style.backgroundImage = `url('${data[1].name}')`;
        document.getElementById("poster3").style.backgroundImage = `url('${data[2].name}')`;

        // Populate Products Section
        const productsContainer = document.getElementById("products");
        data.slice(2).forEach(item => {
            const product = `
                <div class="col-md-3">
                    <div class="card product-card">
                        <img src="${item.name}" class="card-img-top" alt="${item.title}">
                        <div class="card-body">
                            <h5 class="card-title">${item.title}</h5>
                            <p class="card-text">${item.post}</p>
                        </div>
                    </div>
                </div>
            `;
            productsContainer.innerHTML += product;
        });

        // Populate Ideas Section
        const ideasContainer = document.getElementById("ideas");
        data.slice(0, 2).forEach(item => {
            const idea = `
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="${item.name}" class="img-fluid rounded-start" alt="${item.title}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${item.title}</h5>
                                    <p class="card-text">${item.post}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            ideasContainer.innerHTML += idea;
        });

        // Populate Education Section
        const educationContainer = document.getElementById("education");
        const education = `
            <div class="col-md-12">
                <p>Here we will provide useful educational content to help our users better understand our products and services.</p>
            </div>
        `;
        educationContainer.innerHTML = education;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
