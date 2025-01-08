<div class="container mt-5">
    <p id="alert"></p>
    <form method="post" enctype="multipart/form-data">
         <select class="form-control" name="imgid" id="" required>
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

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" required>

        <label for="post">Information</label>
        <textarea class="form-control" name="post" required></textarea>

        <label for="file">Upload Image</label>
        <input class="form-control" id="fileInput" name="file" type="file" required>

        <button type="submit" name="submit" class="btn btn-primary mt-3">Add View Iteam</button>
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
            $name= $targetDir.$fileName;
            $insert->bindParam(':name',$name);

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
