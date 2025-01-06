<div class="container min-vh-100 mt-5">
      <a href="index.php?page=fileform" class="btn btn-primary">Add Image</a>
    <form name="form1" action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Display Images"></td>
            </tr>
        </table>
    </form>

    <?php include_once 'config.php'; ?>

    <?php
    if (isset($_POST["submit"])) {
        try {
            $res = $databass->query("SELECT * FROM `images`");
            echo '<div class="row">';
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $imageURL = 'components/uploads/' . $row["file_name"];
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="' . $imageURL . '" class="card-img-top" alt="Image" style="height: 200px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                          <h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5> <!-- عرض العنوان -->
                            <p class="card-text">' . htmlspecialchars($row["description"]) . '</p> <!-- عرض الوصف -->
                            <a href="index.php?page=view_one_img&imgid=' . $row["id"] . '" class="btn btn-primary">View</a>
                            <a href="index.php?page=delate_img&imgid=' . $row["id"] . '" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>';
            }
            echo '</div>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
</div>
<!-- http://yourdomain.com/index.php?page=profile&imgid=456 -->
