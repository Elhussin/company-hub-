<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../html/icon.html') ?>
    <title>Update Main</title>

</head>

<body>

    <?php include('../html/nav.html'); ?>

    <?php include '../php/dps.php'; ?>


    <!-- right box -->


    <div style="overflow:auto">
        <div class="menu">
            <a href="admin/index.php">Admin</a>
            <a href="index.php">Home</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
        </div>
        <div class="main" style="margin-top:10px;">
            <p id="alert"></p>
            <div class="table-responsive">
                <table class=" table  table-borderless">
                    <thead class="table-dark">
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
                            </td>

                    </thead>
                    <tbody>
                        <tr>

                            <!-- new viwer uptah  -->
                            <form method="post" enctype="multipart/form-data">
                                <th> <label>Titel</label> </th>

                                <td> <input class="w-100" type="text" name="title" required> </td>
                                <td>
                                    <p id="title"></p>
                                </td>
                        </tr>

                        <tr>
                            <th scope="row"> <label for="">INFOPRMATIAN</label> </th>
                            <td> <textarea class="w-100" name="post" required></textarea> </td>
                            <td>
                                <p id="post"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"> <label>SELECT BOSTER IMG</label></th>
                            <td> <select name="imgid" id="" required "  class=" w-100">
                                    <option>SELECT IMG </option>
                                    <option value="img1">Boster 1</option>
                                    <option value="img2">Boster 2</option>
                                    <option value="img3">Boster 3</option>
                                    <option value="img4">Head 1</option>
                                    <option value="img5">Head 2</option>
                                    <option value="img6">Head 3</option>
                                    <option value="img7">Slide 1</option>
                                    <option value="img8">Slide 2</option>
                                    <option value="img9">Slide 3</option>
                                </select> </td>

                            <td> </td>
                        </tr>
                        <tr>
                            <th scope="row"> <label>UPLOD IMG </label> </th>
                            <td> <input name="file" type="file" required class="w-100"> </td>
                            <td> <img style="width:150px; height: 150px;" id="img" src=""></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td> <button type="submit" name="submit" class="btn btn-info w-100">Ubdate Main
                                    View</button></td>
                            <td> </td>
                        </tr>
                        </form>
                    </tbody>
                </table>

            </div>
            <?php


            // Include the database configuration file


            $statusMsg = '';
            // File upload path
            $targetDir = "uploads/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && !empty($_POST["imgid"])) {
                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into database
                        // $insert = $databass->query("UPDATE `view` SET   name=:name ,title=:title, post=:post,where imgid=:id");
                        $insert = $databass->prepare("UPDATE `view` SET   name=:name ,title=:title, post=:post where imgid=:id");
                        $insert->bindParam('id', $_POST['imgid']);
                        $insert->bindParam('title', $_POST['title']);
                        $insert->bindParam('post', $_POST['post']);
                        $insert->bindParam('name', $fileName);
                        if ($insert->execute()) {
                            $statusMsg = "<p class='alert alert-primary'>The file " . $fileName . "  has been uploaded successfully. and the informatian is update </p>";
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                            // var_dump( $insert);
                            // var_dump($insert->errorInfo());
                        }
                    } else {
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            } else {
                // $statusMsg = 'Please select a file to upload.';
            }

            // Display status message
            echo $statusMsg;
            ?>
            <script type="text/javascript">
            var alertMsg = '<?php echo $statusMsg ?>';
            document.getElementById("alert").innerHTML = alertMsg;
            </script>
        </div>



        <div class="right">
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
        </div>


    </div>

    <?php include('../html/footer.html');
            ?>






</body>

<script>
// let search=document.getElementById("search");
document.getElementById("search").onchange = () => {
    let searchvalue = document.getElementById("search").value;
    // var p =document.getElementById("view")
    var title = document.getElementById("title")
    var post = document.getElementById("post")
    var img = document.getElementById("img")
    var name = document.getElementById("name")
    if (searchvalue.length > 1) {
        fetch("api/apiview.php", {
            method: 'POSt',
            body: JSON.stringify({
                value: searchvalue
            }) // تحويل الي JISON
        }).then(response => response.json()).then(
            data => {

                // data => console.log(data);
                //  data=>JSON.parse(data)
                data.forEach(element => {

                    post.innerHTML = element.post;
                    title.innerHTML = element.title;
                    img.src = " http://new-worled.eb2a.com/company/file/uploads/" + element.name;
                })
            }
        )
    }
}
</script>

</html>