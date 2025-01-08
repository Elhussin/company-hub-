
    <div class="container mt-5">
        <div style="overflow:auto">
            <div>
                <p id="alert"></p>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="table-dark">
                            <tr>
                                <th>TYPE</th>
                                <th>UPDATE VIEW</th>
                                <th>
                                    <form name="formold" action="" method="post" enctype="multipart/form-data">
                                        <select name="imgidold" id="search" required class="w-100">
                                            <option>VIEW OLD INFOPRMATIAN</option>
                                            <option value="img1">Boster 1</option>
                                            <option value="img2">Boster 2</option>
                                            <option value="img3">Boster 3</option>
                                            <option value="img4">Head 1</option>
                                            <option value="img5">Head 2</option>
                                            <option value="img6">Head 3</option>
                                            <option value="img7">Slide 1</option>
                                            <option value="img8">Slide 2</option>
                                            <option value="img9">Slide 3</option>
                                        </select>
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="post" enctype="multipart/form-data">
                                <tr>
                                    <th><label>Titel</label></th>
                                    <td><input class="w-100" type="text" name="title" required></td>
                                    <td><p id="title"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="">INFOPRMATIAN</label></th>
                                    <td><textarea class="w-100" name="post" required></textarea></td>
                                    <td><p id="post"></p></td>
                                </tr>
                                <tr>
                                    <th scope="row"><label>SELECT BOSTER IMG</label></th>
                                    <td>
                                        <select name="imgid" id="" required class="w-100">
                                            <option>SELECT IMG</option>
                                            <option value="img1">Boster 1</option>
                                            <option value="img2">Boster 2</option>
                                            <option value="img3">Boster 3</option>
                                            <option value="img4">Head 1</option>
                                            <option value="img5">Head 2</option>
                                            <option value="img6">Head 3</option>
                                            <option value="img7">Slide 1</option>
                                            <option value="img8">Slide 2</option>
                                            <option value="img9">Slide 3</option>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"><label>UPLOD IMG</label></th>
                                    <td><input name="file" type="file" required class="w-100"></td>
                                    <td><img style="width:150px; height: 150px;" id="img" src=""></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><button type="submit" name="submit" class="btn btn-info w-100">Update Main View</button></td>
                                    <td></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                <?php
                require_once 'config.php';

                $statusMsg = '';
                $targetDir = "media/";

                // التحقق من وجود الملف قبل الوصول إليه
                if (isset($_FILES["file"]) && !empty($_FILES["file"]["name"]) && isset($_POST["submit"]) && !empty($_POST["imgid"])) {
                    $fileName = basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                    // أنواع الملفات المسموح بها
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');

                    // التحقق من نوع الملف
                    if (in_array($fileType, $allowTypes)) {
                        // رفع الملف إلى المجلد
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                            // تحديث البيانات في قاعدة البيانات
                            $insert = $databass->prepare("UPDATE `view` SET name=:name, title=:title, post=:post WHERE imgid=:id");
                            $insert->bindParam(':id', $_POST['imgid']);
                            $insert->bindParam(':title', $_POST['title']);
                            $insert->bindParam(':post', $_POST['post']);
                            $insert->bindParam(':name', $fileName);

                            if ($insert->execute()) {
                                $statusMsg = "<p class='alert alert-success'>The file " . $fileName . " has been uploaded successfully. The information has been updated.</p>";
                            } else {
                                $statusMsg = "<p class='alert alert-danger'>File upload failed, please try again.</p>";
                            }
                        } else {
                            $statusMsg = "<p class='alert alert-danger'>Sorry, there was an error uploading your file.</p>";
                        }
                    } else {
                        $statusMsg = "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</p>";
                    }
                } else {
                    $statusMsg = "<p class='alert alert-warning'>Please select a file to upload and fill all required fields.</p>";
                }

                // عرض رسالة الحالة
                // echo $statusMsg;
                ?>

                <script type="text/javascript">
                    var alertMsg = `<?php echo $statusMsg ?>`;
                    document.getElementById("alert").innerHTML = alertMsg;
                </script>
            </div>
        </div>
    </div>



    <script>
      document.getElementById("search").onchange = () => {
    let searchvalue = document.getElementById("search").value;
    var title = document.getElementById("title");
    var post = document.getElementById("post");
    var img = document.getElementById("img");

    if (searchvalue.length > 1) {
        fetch("api/apiview.php", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ value: searchvalue })
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                post.innerHTML = element.post;
                title.innerHTML = element.title;
                img.src = "/" + element.name;
            });
        })
        .catch(error => console.error('Error:', error));
    }
};
    </script>
