<div class="container mt-5">
    <h1 class="text-center mb-4">Upload Media</h1>
    <form method="POST" id="files" enctype="multipart/form-data" class="border p-4 rounded bg-light">
        <!-- ملف 1 -->
        <div class="mb-3">
            <label for="file" class="form-label">File 1:</label>
            <input type="file" name="file" class="form-control" multiple>
            <div id="file1Details">
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" name="name" class="form-control" required>
            </div>  
            <div class="mb-3">
                <label for="description" class="form-label">Description </label>
                <textarea name="description" class="form-control" rows="2" required></textarea>
                    </div>      
            </div> <!-- مكان لعرض حقول اسم ووصف لكل ملف -->

        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
                         <div class="text-center">
                        <br><br>
                        <a href="index.php?page=view_imgs" class="btn btn-secondary">Back to Gallery</a>
                    </div>
    <!-- لعرض رسائل الحالة -->
    <div id="statusMessage" class="mt-4"></div>
</div>

<script>
    let getForm = document.getElementById("files");

    // إرسال النموذج باستخدام Fetch API
    getForm.onsubmit = (form1) => {
        form1.preventDefault(); // منع الإرسال المباشر إلى السيرفر

        let formdata = new FormData(getForm);

        for (let [key, value] of formdata.entries()) {
            console.log(key, value);
            }   
        fetch("api/uplod_img_api.php", {
            method: 'POST',
            body: formdata
        })
        .then(response => response.json()) // استقبال الرد كـ JSON
        .then(data => {
            let statusMessage = document.getElementById("statusMessage");
            statusMessage.innerHTML = ""; // تنظيف الرسائل السابقة

            if (data.status === "success") {
                data.messages.forEach(message => {
                    statusMessage.innerHTML += `<p style="color: green;">${message}</p>`;
                });
            } else {
                data.messages.forEach(message => {
                    statusMessage.innerHTML += `<p style="color: red;">${message}</p>`;
                });
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    };
</script>