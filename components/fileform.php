<div class="container mt-5">
        <h1 class="text-center mb-4">Upload Files</h1>
        <form method="POST" id="files" enctype="multipart/form-data" class="border p-4 rounded bg-light">
            <div class="mb-3">
                <label for="file" class="form-label">File 1:</label>
                <input type="file" name="file[]" class="form-control" multiple> <!-- يمكن رفع عدة ملفات -->
            </div>
            <div class="mb-3">
                <label for="file1" class="form-label">File 2:</label>
                <input type="file" name="file1[]" class="form-control" multiple> <!-- يمكن رفع عدة ملفات -->
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

        <!-- لعرض رسائل الحالة -->
        <div id="statusMessage" class="mt-4"></div>
    </div>

<script>
    let getForm = document.getElementById("files");

getForm.onsubmit = (form1) => {
    form1.preventDefault(); // منع الإرسال المباشر إلى السيرفر

    let formdata = new FormData(getForm);

    fetch("components/file.php", {
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