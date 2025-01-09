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




<?php include_once 'config.php';?>


<div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style=" margin:auto;  max-width:70%">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <!-- booster 0 -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> -->
            <img id="img0" class=" bd-placeholder-img" width="100%" height="500px" src="img/icon.jpg"
                alt="">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1 id="title0">تصفحا طلباتك الان</h1>
                    <p id="post0">يمكن عملائنا الكرام الأن تصفح الفواتير الخاص بهم وبيانتهم الخاصه.</p>
                    <p><a class="btn btn-lg btn-primary" href="sign/login.php">Sign up today</a></p>
                </div>
            </div>
        </div>
        <!-- booster 1 -->
        <div class="carousel-item">
            <img id="img1" class="bd-placeholder-img" width="100%" height="500px" src="img/home.jpg" alt="">

            <div class="container">
                <div class="carousel-caption">
                    <h1 id="title1"> >احدث الاخبار</h1>
                    <p id="post1">للاطلاع علي احدث التطورات في البصريات</p>
                    <p><a class="btn btn-lg btn-primary" href="php/learn.php">التعليم</a></p>
                </div>
            </div>
        </div>
        <!-- booster 2 -->
        <div class="carousel-item">
            <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg> -->
            <img id="img2" class="bd-placeholder-img" width="100%" height="500px" src="img/home.jpg" alt="">
            <div class="container">
                <div class="carousel-caption text-end">
                    <h1 id="title2"> المنتجات الحديثة</h1>
                    <p id="post2">يمكنك رؤيه احدث المنتجات الأن </p>
                    <p><a class="btn btn-lg btn-primary" href="prodect/last.php">احدث المنتجات</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <!-- booster 3 -->
        <div class="col-lg-4">
            <img id="img3" class="bd-placeholder-img rounded-circle" width="140" height="140"
                src="img/logo.PNG" alt="">
            <h2 id="title3">حسين للبصريات </h2>
            <p id="post3">خبرات لاكثر من عشر سنوات في متناول يد الان </p>
            <p><a class="btn btn-info" href="php/about.php">see more about... &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <!-- booster4  -->
        <div class="col-lg-4">
            <img id="img4" class="bd-placeholder-img rounded-circle" width="140" height="140"
                src="img/logo.PNG" alt="">

            <h2 id="title4">الماركات </h2>
            <p id="post4">احدث صيحات الموضه العالميه لحميع الماركات </p>
            <p><a class="btn btn-info" href="prodect/last.php">See brand..&raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <!-- booster  5-->

        <div class="col-lg-4">
            <img id="img5" class="bd-placeholder-img rounded-circle" width="140" height="140"
                src="img/logo.PNG" alt="">

            <h2 id="title5">kids </h2>
            <p id="post5">kids arya </p>
            <p><a class="btn btn-info" href="prodect/kids.php">See kids..&raquo;</a></p>
        </div>
        <!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->
    <!-- booster 6 -->
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 id="title6" class="featurette-heading">First featurette heading. <span
                    class="text-muted">It’ll blow your mind.</span></h2>
            <p id="post6" class="lead">Some great placeholder content for the first featurette here. Imagine
                some exciting prose here.</p>
        </div>
        <div class="col-md-5">
            <img id="img6"
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="500" height="500" src="img/icon.jpg" alt="">

        </div>
    </div>

    <hr class="featurette-divider">
    <!-- booster 7 -->
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 id="title7" class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See
                    for yourself.</span></h2>
            <p id="post7" class="lead">Another featurette? Of course. More placeholder content here to give
                you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img id="img7"
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="500" height="500" src="img/icon.jpg" alt="">

        </div>
    </div>

    <hr class="featurette-divider">
    <!-- booster8 -->
    <div class="row featurette">
        <div class="col-md-7">
            <h2 id="title8" class="featurette-heading">And lastly, this one. <span
                    class="text-muted">Checkmate.</span></h2>
            <p id="post8" class="lead">And yes, this is the last block of representative placeholder
                content. Again, not really intended to be actually read, simply here to give you a better
                view of what this would look like with some actual content. Your content.</p>
        </div>
        <div class="col-md-5">
            <img id="img8"
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="500" height="500" src="img/icon.jpg" alt="">


        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->


<!-- footer  -->
<script>

var title0 = document.getElementById("title0")
var post0 = document.getElementById("post0")
var img0 = document.getElementById("img0")

var title1 = document.getElementById("title1")
var post1 = document.getElementById("post1")
var img1 = document.getElementById("img1")

var title2 = document.getElementById("title2")
var post2 = document.getElementById("post2")
var img2 = document.getElementById("img2")

var title3 = document.getElementById("title3")
var post3 = document.getElementById("post3")
var img3 = document.getElementById("img3")

var title4 = document.getElementById("title4")
var post4 = document.getElementById("post4")
var img4 = document.getElementById("img4")

var title5 = document.getElementById("title5")
var post5 = document.getElementById("post5")
var img5 = document.getElementById("img5")


var title6 = document.getElementById("title6")
var post6 = document.getElementById("post6")
var img6 = document.getElementById("img6")


var title7 = document.getElementById("title7")
var post7 = document.getElementById("post7")
var img7 = document.getElementById("img7")


var title8 = document.getElementById("title8")
var post8 = document.getElementById("post8")
var img8 = document.getElementById("img8")


fetch("http://new-worled.eb2a.com/company/api/apiindex.php").then(response => response.json()).then(
    data => {
        //  data =data.reverse(); // لعكس النتائج
        let main = document.getElementById("contant");

        for (var i in data) {
            if (i == 0) {

                title0.innerHTML = data[i].title;
                post0.innerHTML = data[i].post;
                img0.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 1) {

                title1.innerHTML = data[i].title;
                post1.innerHTML = data[i].post;
                img1.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 2) {

                title2.innerHTML = data[i].title;
                post2.innerHTML = data[i].post;
                img2.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 3) {
                title3.innerHTML = data[i].title;
                post3.innerHTML = data[i].post;
                img3.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 4) {

                title4.innerHTML = data[i].title;
                post4.innerHTML = data[i].post;
                img4.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 5) {

                title5.innerHTML = data[i].title;
                post5.innerHTML = data[i].post;
                img5.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 6) {

                title6.innerHTML = data[i].title;
                post6.innerHTML = data[i].post;
                img6.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 7) {
                // console.log(data[i])// 
                title7.innerHTML = data[i].title;
                post7.innerHTML = data[i].post;
                img7.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            } else if (i == 8) {

                title8.innerHTML = data[i].title;
                post8.innerHTML = data[i].post;
                img8.src = "http://new-worled.eb2a.com/company/file/uploads/" + data[i].name;
            }


        }


    });
</script>
