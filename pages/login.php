<?php
ob_start();  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'config.php';

// include_once 'pages/function.php';
if (isset($_POST['login'])) {
    $login = $databass->prepare("SELECT * FROM `users` WHERE EMAIL=:EMAIL AND PASSWORD=:PASSWORD");
    $passwordUser = sha1($_POST['bassword']);
    $login->bindParam("EMAIL", $_POST['email']);
    $login->bindParam("PASSWORD", $passwordUser);
    $login->execute();
    if ($login->rowCount() === 1) {
        $user = $login->fetchObject();
        if ($user->ACTIEV === 1) {
            $_SESSION['user'] = $user;
            header("Location: index.php?page=dashboard");
            exit();
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
            خطأ في بيانات الدخول
            </div>';
    }
}
ob_end_flush();  // إنهاء التخزين المؤقت للمخرجات بعد تنفيذ كل شيء
?>
<section class="gradient-form">
    <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="<?= ROOT_PATH ?>static/img/logo.webp" style="width: 185px; border-radius:50%" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                </div>

                                <form method="POST" id="loginForm">
                                    <p>Please login to your account</p>
                                    <div id="alert"></div>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example11" class="form-control"
                                            placeholder="Phone number or email address" name="email" required />
                                        <label class="form-label" for="form2Example11">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example22" class="form-control"
                                            name="bassword" required />
                                        <label class="form-label" for="form2Example22">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button type="submit" class="btn btn-primary btn-block mb-4  w-50" name="login">
                                            Log in </button>

                                        <a class="text-muted" href="index.php?page=reset">Forgot password?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a type="button" class="btn btn-outline-danger" href="index.php?page=register">Create new </a>
                                    </div>


                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2"
                            style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">We are The Company Hup Team</h4>
                                <p class="small">We are a team of professionals who are dedicated to providing the best service to our clients. Our goal is to help you succeed in your business by providing you with the tools and resources you need to grow and thrive.</p>
                                <p class="small">We offer a wide range of services, including web design, development, and marketing. Our team is made up of experts in their field who are passionate about what they do. We work closely with our clients to understand their needs and provide them with the best solutions to help them achieve their goals.</p>
                                <p class="small">If you are looking for a team of professionals who are dedicated to helping you succeed, then look no further than The Company Hup Team. Contact us today to learn more about how we can help you grow your business.</p>

                                <p class="small mb-0"> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>