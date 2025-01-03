<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href=" http://new-worled.eb2a.com/company/">
    <title>File</title>
</head>

<body>



    <?php  include('../html/nav.html') ?>


    <form action="file/upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>

    <form method="POST" id="files" enctype="multipart/form-data">
        file : <input type="file" name="file">
        <br>
        file : <input type="file" name="file1">
        <button type="submit">send</button>
    </form>


    <script>
    let getForm = document.getElementById("files");

    getForm.onsubmit = (form1) => { // لمنع الارسال المياشر الي السيرفر 
        form1.preventDefault();


        let formdata = new FormData(getForm);

        fetch("php/file.php", {
                method: 'POST',
                body: formdata
            })
            .then(response => response.text()).then(data => { // هذا السطر خاص بالرغبه في الحصول علي رد 
                console.log(data);
            })
    };
    </script>
    <?php  include('../html/footer.html') ?>
</body>

</html>
<?php
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $databass->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>