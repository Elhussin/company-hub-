<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="icon" href="../img/icon.jpg" />
    <link rel="shortcut" href="../img/icon.jpg" />
    <link rel="apple-touch-icon" href="../img/icon.jpg" />
    <link rel="stylesheet" href="../css/bootstrab.css">
</head>

<body>
    <nav>
        <?php require_once "../html/nav.html"; ?>
    </nav>




    <div style="overflow:auto">
        <div class="menu">
            <table class="table table-borderless ">
                <thead>

                </thead>
                <tbody>

                    <tr>
                        <td> <a class=" btn btn-warning " type="button" href="admin/admin.php">admin </a> </td>
                        <td> <a class=" btn btn-warning " type="button" href="check_box.php">check_box </a> </td>
                        <td> <a class=" btn btn-warning " type="button" href="home.php">home </a> </td>

                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning " type="button" href="tray.php">tray </a> </td>
                        <td> <a class=" btn btn-warning" href="view.php">view </a> </td>
                    </tr>

                    <tr>
                        <td> <a class=" btn btn-warning" href="coustmer/coustmer.php">coustmer </a> </td>
                        <td> <a class=" btn btn-warning" href="css/FLEX.html">FLEX </a> </td>

                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="file/viewcontorl.php">viewcontorl</a> </td>
                        <td><a class=" btn btn-warning" href="file/viewimg.php">view img </a></td>

                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="file/upload.php">uplod file </a></td>
                        <td> <a class=" btn btn-warning" href="file/fileform.php">fileform </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="html/countery.html">countery </a></td>
                        <td> <a class=" btn btn-warning" href="html/footer.html">footer </a></td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="html/icon.html">icon </a></td>
                        <td> <a class=" btn btn-warning" href="html/nav.html">nav </a></td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="html/power.html">power </a></td>
                        <td><a class=" btn btn-warning" href="php/adduserform.php">adduserform </a></td>
                    </tr>


                    <tr>

                        <td> <a class=" btn btn-warning" href="php/learn.php">learn </a> </td>
                        <td> <a class=" btn btn-warning" href="php/searchfrom.php">search </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="php/about.php">about </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/contac.php">contec lens </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/fram.php">frame </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="prodect/kids.php">Kids </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/last.php">last </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="prodect/add_iteam.php">add iteamt </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/brand.php"> Brand </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="prodect/newcompany.php">new Company </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/prodect.php">new Brodect </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="prodect/lens.php">lens </a> </td>
                        <td> <a class=" btn btn-warning" href="prodect/lens_type.php">lens type </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="sign/active.php">Active</a> </td>
                        <td> <a class=" btn btn-warning" href="sign/login.php">login </a> </td>
                    </tr>
                    <tr>
                        <td> <a class=" btn btn-warning" href="sign/register.php">register </a> </td>
                        <td> <a class=" btn btn-warning" href="sign/reset.php">reset </a> </td>
                    </tr>


                </tbody>
            </table>

        </div>
        <main>

            <div class="container">
                <div class="row row-cols-4">
                    <div class="col">Column
                        <div class="card" style="width: 18rem;">
                            <img src="img/coustmer.png" class="card-img-top" alt="..." style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a class=" btn btn-info" href="php/searchfrom.php" class="btn btn-primary w-100">View
                                    User</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">Column
                        <div class="card" style="width: 18rem;">
                            <img src="img/user1.jpg" class="card-img-top" alt="new user" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a class=" btn btn-info" href="php/adduserform.php" class="btn btn-primary w-100">New
                                    User</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">Column
                        <div class="card" style="width: 18rem;">
                            <img src="img/uplod.png" class="card-img-top " alt="Uplod" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a class=" btn btn-info" href="php/prodect.php" class="btn btn-primary w-100">New
                                    Iteam</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">Column
                        <div class="card" style="width: 18rem;">
                            <img src="img/uplod.png" class="card-img-top " alt="Uplod" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a class=" btn btn-info" href="html/file.html" class="btn btn-primary w-100">Uplod
                                    File</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">Column
                        <div class="card" style="width: 18rem;">
                            <img src="img/uplod.png" class="card-img-top " alt="Uplod" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">تحديث العرض الرئيسيه</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a class=" btn btn-info" href="file/viewcontorl.php"
                                    class="btn btn-primary w-100">UPDATE VIEW</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5> -->
                    </div>
                    <!-- <i class="fas fa-copy"></i> -->

                    <div class="card-footer">
                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                    </div>
                </div>
            </div>
    </div>
    </div>

    </main>
    </div>


    </div>
    <?php include('../html/footer.html') ?>
</body>

</html>