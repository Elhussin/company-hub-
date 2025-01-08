
    <div style="overflow:auto">
        <div class="menu">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <a href="#">Link 4</a>
        </div>
        <div class="container ">
            <div class="row ">
                <div class="col main">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/home.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">last brodect </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col ">
                    <div class="card main" style="width: 18rem;">
                        <img src="./img/home.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">last brodect </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col ">
                    <div class="card main" style="width: 18rem;">
                        <img src="./img/home.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">last brodect </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- cards  -->
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
            data-bs-interval="false" style="margin: auto; width: 75%;" float: right;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/coustmer.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/logo.PNG" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/user.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <form name="form1" action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><input type="submit" name="submit2" value="display"></td>
                </tr>
            </table>
        </form>


        <?php

        include_once 'config.php';

        $res = $databass->query("SELECT * FROM `images`");

    echo "<table>";
    echo "<tr>";

            while ($row = mysqli_fetch_array($res)) {
            $imageURL = 'file/uploads/' . $row["file_name"];
            echo "<td>";
            echo '<div class="col ">
        <div class="card main" style="width: 18rem;">';

            echo '<img height="200" width="200"   class="card-img-top" src="' . $imageURL . ' "/>';
            echo ' <div class="card-body">';
            echo ' <h5 class="card-title">last brodect </h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content</p>
        <h5 class="card-title">last brodect </h5>

        '

            ?><a class="btn" class="btn btn-primary" href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php
        }
            echo "</td>";
            echo "</tr>";
        echo "</table>";

                ?>
   

</body>

</html>


