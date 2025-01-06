<div style="height: 100vh; max-width: 500px; margin: auto;">

    <!-- <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100vh; " > -->
    <?php
    require './pages/mail.php';
    require_once 'config.php';
    if (isset($_GET['code'])) {

        echo
        '<form method="POST">
    
    <div class="p-3 shadow mb-3">كلمه المرور الجديده   <div>
    <input class="form-control" type="password" name="password" required />
    <button class="btn btn-info mt-3 w-100" type="submit" name="pasupdat" >تغيير كلمه المرور</button>
    </form>';
    } else if (isset($_GET['email'])) {
        //&& isset($_GET['code']
        echo
        '<form method="POST">
    
    <div class="p-3 shadow mb-3">كلمه المرور الجديده   <div>
    <input class="form-control"  type="password" name="password" required/>
    <button class="btn btn-info mt-3 w-100 " type="submit" name="pasupdat" >تغيير كلمه المرور</button>
    </form>';
    } else {
        echo '  <form method="post">

        <div class="p-3 shadow mb-3 mt-3"> User Email
     
        <input class="form-control" type="email" name="email">

        <button class="btn mt-3 btn-info mt-3 w-100 " name="reset" type="submit"> Enter Your Email</button>
        </div>
    </form>  ';
        }
        if (isset($_POST['reset'])) {
            $reset = $databass->prepare("SELECT EMAIL ,SECUERTY_COD FROM `users` WHERE EMAIL=:EMAIL ");
            $reset->bindParam('EMAIL', $_POST['email']);
            $reset->execute();
            if ($reset->rowCount() > 0) {
                echo '<div class="alert alert-success mt-3">تم التحقق من البريد الإلكتروني</div><br>';
                // header("refresh:2;");

                $user = $reset->fetchObject();

                try {
                    // إعداد الرابط
                    $activationLink = ROOT_PATH . 'index.php?page=reset&email=' . $_POST['email'] . '&code=' . $user->SECUERTY_COD;

                    // إعداد المحتوى
                    $subject = 'Reset Email';
                    $body = '
                <p>يرجى تأكيد إعادة تعيين كلمة المرور:</p>
                <div>رابط إعادة التعيين:</div>
                <a href="' . $activationLink . '">اضغط هنا لإعادة تعيين كلمة المرور</a>
            ';
                    $altBody = "CONFIRM " . $activationLink;

                    // إضافة المستلم
                    $email = $_POST['email'];

                    // إرسال البريد
                    $result = sendEmail($email, $subject, $body, $altBody);

                    if ($result === true) {
                        echo '<div class="alert alert-success mt-3">
                        <p>تم إرسال رابط إعادة التعيين إلى بريدك الإلكتروني.</p>
                        <p>يرجى التحقق من بريدك الإلكتروني لإعادة تعيين كلمة المرور.</p>
                        <p>إذا لم تجد البريد الإلكتروني في صندوق الوارد، يرجى التحقق من صندوق الرسائل المزعجة.</p>
                        <p>إذا لم تستلم البريد الإلكتروني، يرجى <a href="index.php?page=contact">التواصل معنا</a>.</p>
                        <br>
                        <a href="index.php">العودة إلى الصفحة الرئيسية</a>
                        </div>';
                    } else {
                        echo $result; // عرض رسالة الخطأ إذا حدثت مشكلة
                        echo '<div class="alert alert-danger mt-3">حدث خطأ أثناء إرسال البريد الإلكتروني.</div>';
                    }
                } catch (Exception $e) {
                    echo '<div class="alert alert-danger mt-3">حدث خطأ: ' . $e->getMessage() . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3">البريد الإلكتروني غير موجود.</div>';
            }
        }




        if (isset($_POST['pasupdat'])) {



            $resetPassword = $databass->prepare("UPDATE `users` SET PASSWORD=:PASSWORD  WHERE EMAIL=:EMAIL ");
            $password = sha1($_POST['password']);
            $resetPassword->bindParam('PASSWORD', $password);
            // $resetPassword->bindParam('PASSWORD',$_POST['password']);
            $resetPassword->bindParam('EMAIL', $_GET['email']);  // الايميل المرسل من الرابط


            if ($resetPassword->execute()) {
                echo '<div class="alert alert-success m-3" role="alert"> تم تغيير كلمه المرو بنجاح </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">   خطاء في تعيين كلمه المرور </div>';
            }
        }

        ?>


    <!-- </div> -->
</div>