<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
    .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(0, 0.00%, 100.00%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
    }

    #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">

        <div class="row gx-lg-5 align-items-center mb-5">

            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    The best offer <br />
                    <span style="color: hsl(218, 81%, 75%)">for your business</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Temporibus, expedita iusto veniam atque, magni tempora mollitia
                    dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                    ab ipsum nisi dolorem modi. Quos?
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="POST">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div id="alert"></div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" class="form-control" name="Name" id="Name" required />
                                        <label class="form-label" for="Name">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lName" class="form-control" name="lName" />
                                        <label class="form-label" for="lName">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="Email" class="form-control" name="Email" required />
                                <label class="form-label" for="Email">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="date" id="Age" class="form-control" name="Age" />
                                <label class="form-label" for="Age">Ege</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="Password"
                                    required />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                    checked />
                                <label class="form-check-label" for="form2Example33">
                                    Subscribe to our newsletter
                                </label>
                            </div>

                            <!-- Submit button -->
                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <button type="submit" class="btn btn-primary btn-block mb-4  w-50" name="signUP">
                                    Sign up
                                </button>
                            </div>
                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <p class="mb-0 me-2">You have an account?</p>
                                <a type="button" class="btn btn-outline-danger" href="index.php?page=login">Log IN
                                </a>
                                <!-- <p class="mb-0 me-2"> </p> -->
                                <!-- <a class="text-muted" href="sign/reset.php">Forgot password?</a> -->
                            </div>
                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <p class="mb-0 me-2">Forgot password...?</p>
                                <a class="text-muted" href="index.php?page=reset">Reset</a>
                            </div>


                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Section: Design Block -->


<?php
    // require_once 'datapass.php';
    require  "pages/mail.php";
    include_once 'config.php';


    // التحقق من عدم وجود الايميل سابقا
    if (isset($_POST['signUP'])) {
        $checkEmail = $databass->prepare("SELECT * FROM `users` WHERE EMAIL= :EMAIL1");
        $Email = $_POST['Email'];
        $checkEmail->bindParam('EMAIL1', $Email);
        $checkEmail->execute();

        if ($checkEmail->rowCount() > 0) {
            echo "<script>document.getElementById('alert').innerHTML = '<div class=\"alert alert-danger\">      This Email Is Use " . $Email. " </div>';</script>";

        } else {
            // البيانات المستقبله من العميل 
            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $age = $_POST['Age'];
            $password = sha1($_POST['Password']); // لتشفير كلمه المرور ايضا يمكن استعمال md5
            $SECUERTY_COD = md5(date("h:i:s"));

            $register = $databass->prepare("INSERT INTO `users`(`NAME`, `EMAIL`, `AGE`, `PASSWORD` ,`SECUERTY_COD`,`ROEL`,`ACTIEV` ) 
        VALUES (:name,:email ,:age,:password ,:SECUERTY_COD,'USER' ,'0')");
            $register->bindParam('name', $name);
            $register->bindParam('email', $email);
            $register->bindParam('age', $age);
            $register->bindParam('password', $password);
            $register->bindParam('SECUERTY_COD', $SECUERTY_COD);

            if ($register->execute()) {

                try {
                    // إعداد العنوان
                    $subject = 'CONFIRM MAIL'; // إضافة الفاصلة المنقوطة
                    // $activationLink = ROOT_PATH . 'pages/active.php?code=' . $SECUERTY_COD;
                    $activationLink = ROOT_PATH .'index.php?page=active&code=' . urlencode($SECUERTY_COD);

                    // إعداد المحتوى
                    $body = ' <p>يرجى تفعيل حسابك، أهلاً وسهلاً بك في عالمك الجديد.</p>
                    <div>رابط التحقق:</div>
                    <a href="' . $activationLink . '">اضغط هنا لتفعيل حسابك</a>';

                    $altBody = "CONFIRM " . $activationLink;


                    // إرسال البريد الإلكتروني
                    $result = sendEmail($email, $subject, $body, $altBody);

                    if ($result === true) {
                        // عرض إشعار النجاح
                        echo "<script>document.getElementById('alert').innerHTML = '<div class=\"alert alert-success\">يرجي تفعيل حسابك من خلال الرابط المرسل الي الايميل الخاص بك.</div>';</script>";
                        
                        // إضافة مهلة 3 ثوانٍ ثم إعادة التوجيه إلى صفحة أخرى
                        echo "<script>
                                setTimeout(function() {
                                window.location.href = 'index.php?page=login';
                                }, 3000); // 3000 مللي ثانية = 3 ثوانٍ
                            </script>";
                    } else {
                        // عرض رسالة الخطأ إذا حدثت مشكلة
                        echo "<script>document.getElementById('alert').innerHTML = '<div class=\"alert alert-danger\">حدث خطأ أثناء إرسال البريد الإلكتروني.</div>';</script>";
                    }
                    
        
                } catch (Exception $e) {
                    echo "<script>document.getElementById('alert').innerHTML = '<div class=\"alert alert-danger\">   حدث خطأ: " . $e->getMessage() . " </div>';</script>";
                }
            }
        }
    }
?>