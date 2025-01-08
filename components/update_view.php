<?php
require_once 'config.php';

// جلب البيانات من جدول view
$options = $databass->query("SELECT imgid, title FROM view")->fetchAll(PDO::FETCH_ASSOC);
$images = $databass->query("SELECT id, name, file_name FROM images")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container min-vh-100 mt-5">
    
    <div>
        <div>
            <p id="alert"></p>
            <div class="row">
                <!-- الحقول -->
                <div class="col-md-6">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="imgidold">View Old Information</label>
                            <select name="imgidold" id="search" required class="form-select">
                                <option value="" disabled selected>Select an Option</option>
                                <?php foreach ($options as $option): ?>
                                    <option value="<?= $option['imgid'] ?>"><?= htmlspecialchars($option['title']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="post">Information</label>
                            <textarea class="form-control" name="post" id="post" required></textarea>
                        </div>
                        <input type="text" name="id" id="id" hidden>

                        <div class="mb-3">
                            <label for="imgid">Select Booster Image</label>
                            <select name="imgid" id="imgid" required class="form-select">
                                <option value="" disabled selected>Select an Image</option>
                                <?php foreach ($images as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id']) ?>" data-img-src="media/<?= htmlspecialchars($option['file_name']) ?>"><?= htmlspecialchars($option['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- حقل مخفي لتخزين رابط الصورة -->
                        <input type="text" name="preview_src" id="preview_src" hidden>

                        <img id="preview" src="" style="width:150px; height:150px; margin-top:10px;">

                        <button type="submit" name="submit" class="btn btn-info w-100">Update Main View</button>
                    </form>
                </div>

                <!-- عرض الصورة -->
                <div class="col-md-6 text-center">
                    <h4>Preview Image</h4>
                    <img id="img" src="media/" alt="Uploaded Image" style="width: 150px; height: 150px; display: none;">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById("search").onchange = () => {
    let searchValue = document.getElementById("search").value;
    var title = document.getElementById("title");
    var post = document.getElementById("post");
    var img = document.getElementById("img");
    var id = document.getElementById("id");

    if (searchValue.length > 1) {
        fetch("api/view_api.php", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ value: searchValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                document.getElementById("alert").innerHTML = "<div class='alert alert-warning'>This item is not added before.</div>";
                img.style.display = "none";
                title.value = '';
                post.value = '';
            } else {
                data.forEach(element => {
                    post.value = element.post;
                    title.value = element.title;
                    id.value = element.id;
                    img.src = element.name;
                    img.style.display = "block";
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById("alert").innerHTML = "<div class='alert alert-danger'>Error fetching data. Please try again.</div>";
        });
    }
};

document.getElementById('imgid').addEventListener('change', function () {
    var selectedOption = this.options[this.selectedIndex];
    var imgSrc = selectedOption.getAttribute('data-img-src');
    
    if (imgSrc) {
        document.getElementById('preview').src = imgSrc;
        document.getElementById('preview_src').value = imgSrc; // تعيين قيمة الحقل المخفي
    } else {
        document.getElementById('preview').src = '';
        document.getElementById('preview_src').value = ''; // مسح قيمة الحقل المخفي
    }
});
</script>



<?php
require_once 'config.php';

$statusMsg = '';

if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $imgid = $_POST['imgid'];
    $title = $_POST['title'];
    $post = $_POST['post'];
    $previewSrc = $_POST['preview_src']; // رابط الصورة من الحقل المخفي

    if (!empty($id) && !empty($imgid) && !empty($title) && !empty($post) && !empty($previewSrc)) {
        try {
            // تحديث البيانات في قاعدة البيانات
            $update = $databass->prepare("UPDATE `view` SET title = :title, post = :post, imgid = :imgid, name = :name WHERE id = :id");
            $update->bindParam(':id', $id);
            $update->bindParam(':imgid', $imgid);
            $update->bindParam(':title', $title);
            $update->bindParam(':post', $post);
            $update->bindParam(':name', $previewSrc); // حفظ رابط الصورة في العمود name

            if ($update->execute()) {
                echo "<script>
       
                    setTimeout(() => {
                        alert('The information has been updated successfully.');
                        window.location.href = 'index.php?page=update_view';
                    }, 2000); // الانتظار لمدة 2 ثانية قبل التحويل
                </script>";
                exit; // إنهاء السكربت
            } else {
                $statusMsg = "<p class='alert alert-danger'>Failed to update the information, please try again.</p>";
            }
            
        } catch (PDOException $e) {
            $statusMsg = "<p class='alert alert-danger'>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        $statusMsg = "<p class='alert alert-warning'>Please fill all required fields and select an image.</p>";
    }
}
?>

<script type="text/javascript">
    var alertMsg = `<?php echo $statusMsg ?>`;
    document.getElementById("alert").innerHTML = alertMsg;
</script>