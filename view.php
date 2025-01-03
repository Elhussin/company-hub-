<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('html/icon.html') ?>
    <title>view</title>
</head>

<body>
    <?php include('html/nav.html');

  ?>






    <p id="time"></p>
    <script>
    setInterval(time, 1000)

    function time() {
        let time = new Date()
        document.getElementById("time").innerHTML =
            time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds() +
            " <br>  Today is" + time.getFullYear() + "/" + time.getDay() + "/" + time.getMonth();
    }
    </script>



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

    $usernam = 'root2';
    $pass = '';

    $cn = mysqli_connect("localhost", "root", "", "company") or die("Could not Connect My Sql");

    // if(isset($_POST["submit2"]))
    // {
    $res = mysqli_query($cn, "select * from images");
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
        <?php include('./html/footer.html') ?>

</body>

</html>

<style>
@media screen and (max-width: 767px) {
    .ProductListing_productListing__3HPbX {
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 0.625em;
        grid-row-gap: 1em;
        margin-bottom: 1em;
    }
}

.ProductListing_productListing__3HPbX {
    display: grid;
    grid-gap: 1.5em;
    gap: 1.5em;
    grid-template-columns: repeat(4, 1fr);
    margin-bottom: 1.5em;
}
</style>



</div>
</div>
</div>
<div class="ProductListing_productListing__3HPbX ">
    <div class="ProductListing_productListing__3HPbX">
        <a href="/sa-ar/spectus-bleu-spc-000525-2900-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000525-2900-1.jpg"
                width="200" height="200" alt="سبيكتوس بلو" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">بلو</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-felix-spc-000636-0118-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV">
            <img class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000636-0118-1.jpg"
                width="200" height="200" alt="سبيكتوس فليكس" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">فليكس</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-pax-spc-000349-0118-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000349-0118-1.jpg"
                width="200" height="200" alt="سبيكتوس نوفا" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">نوفا</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-drake-spc-000322-0718-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000322-0718_1.jpg"
                width="200" height="200" alt="سبيكتوس دريك" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">دريك</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-bleu-spc-000525-0700-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000525-0700-1.jpg"
                width="200" height="200" alt="سبيكتوس بلو" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">بلو</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-jon-spc-000328-0718-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000328-0718-1.jpg"
                width="200" height="200" alt="سبيكتوس جون - تيتانيوم" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">جون - تيتانيوم</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">549 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-felix-spc-000636-0218-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000636-0218-1.jpg"
                width="200" height="200" alt="سبيكتوس فليكس" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">فليكس</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-pax-spc-000349-0518-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000349-0518-1.jpg"
                width="200" height="200" alt="سبيكتوس نوفا" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">نوفا</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-drake-spc-000322-0118-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000322-0118_1.jpg"
                width="200" height="200" alt="سبيكتوس دريك" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">دريك</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-bleu-spc-000525-1200-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000525-1200-1.jpg"
                width="200" height="200" alt="سبيكتوس بلو" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">بلو</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-jon-spc-000328-1218-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000328-1218-1.jpg"
                width="200" height="200" alt="سبيكتوس جون - تيتانيوم" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">جون - تيتانيوم</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">549 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-felix-spc-000636-1318-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000636-1318-1.jpg"
                width="200" height="200" alt="سبيكتوس فليكس" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">فليكس</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-pax-spc-000349-1218-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000349-1218-1.jpg"
                width="200" height="200" alt="سبيكتوس نوفا" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">نوفا</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-drake-spc-000322-1218-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000322-1218_1.jpg"
                width="200" height="200" alt="سبيكتوس دريك" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">دريك</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-jon-spc-000328-0418-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000328-0418-1.jpg"
                width="200" height="200" alt="سبيكتوس جون - تيتانيوم" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">جون - تيتانيوم</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">549 ريال</p>
                    </div>
                </div>
            </div>
        </a><a href="/sa-ar/spectus-drake-spc-000322-0518-glasses.html"
            class="ProductListing_productCard__-00pB ProductListing_hasShadow__2NnBV"><img
                class="ProductListing_image__r4ft-"
                src="https://cdn.eyewa.com/300x300/media/catalog/product/g/l/glasses-spectus-spc-000322-0518_1.jpg"
                width="200" height="200" alt="سبيكتوس دريك" decoding="async" loading="lazy">
            <div class="ProductListing_content__2vLqc">
                <div class="ProductListing_brand__3VAot">سبيكتوس</div>
                <h2 class="ProductListing_name__2kd-L">دريك</h2>
                <div class="ProductListing_price___Aac_">
                    <div data-testid="PriceTestID" class="Price_wrapper__3TkSA">
                        <p class="Price_pdp-regular-price__3cp23">399 ريال</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>