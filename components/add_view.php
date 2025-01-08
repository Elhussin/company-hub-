<div class="container mt-5">
    <p id="alert"></p>
    <form method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" required>

        <label for="post">Information</label>
        <textarea class="form-control" name="post" required></textarea>

        <label for="file">Upload Image</label>
        <input class="form-control" id="fileInput" name="file" type="file" required>
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
        <button type="submit" name="submit" class="btn btn-primary mt-3">Add</button>
    </form>

    <!-- عرض الصورة المضافة -->
    <h3 class="mt-5">Uploaded Image:</h3>
    <img id="previewImage" src="" style="width: 300px; height: auto; display: none;" alt="Uploaded Image">
</div>

<script>
    // تحديث الصورة مباشرة عند اختيارها
    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById("previewImage");
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });
</script>



<!-- 
<div class="container mt-5 justify-content-center">
        <div style="overflow:auto">
            <div>
                <p id="alert"></p>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="table-dark">
                            <tr>
                                <th colspan="2">Add  VIEW Elmeant </th>
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
                                    <td><button type="submit" name="submit" class="btn btn-info w-100">ADD  Main View</button></td>
                                    <td></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</div> -->



<?php






require_once 'config.php';

$statusMsg = '';
$targetDir = "media/";

if (isset($_FILES["file"]) && !empty($_FILES["file"]["name"]) && isset($_POST["submit"])) {
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // أنواع الملفات المسموح بها
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // إدراج البيانات في قاعدة البيانات
            $insert = $databass->prepare("INSERT INTO `view` (imgid, title, post, name) VALUES (:id, :title, :post, :name)");
            $insert->bindParam(':id', $_POST['imgid']);
            $insert->bindParam(':title', $_POST['title']);
            $insert->bindParam(':post', $_POST['post']);
            $insert->bindParam(':name', $fileName);

            if ($insert->execute()) {
                $statusMsg = "<p class='alert alert-success'>The file " . $fileName . " has been uploaded successfully. The information has been added.</p>";
            } else {
                $statusMsg = "<p class='alert alert-danger'>Failed to add the information, please try again.</p>";
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
?>


<script type="text/javascript">
    var alertMsg = `<?php echo $statusMsg ?>`;
    document.getElementById("alert").innerHTML = alertMsg;
</script>
