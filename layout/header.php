<?php
ob_start();  // بدء التخزين المؤقت للمخرجات
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/company/config.php';

$siteName = "Company Hub";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= ROOT_PATH ?>static/img/logo.webp" />
    <link rel="shortcut" href="<?= ROOT_PATH ?>static/img/logo.webp" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="apple-touch-icon" href="<?= ROOT_PATH ?>static/img/logo.webp" />
    <!-- <title><?php echo $title; ?></title> -->
    <title><?php echo isset($title) ? $title : 'Default Title'; ?></title>

    <meta name="description" content="<?php echo $description; ?>">

</head>
</head>`    

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">
                <img src="<?= ROOT_PATH ?>static/img/logo.webp" alt="Logo" width="30" height="24">
            </a>
            <a class="navbar-brand" href="index.php?page=home"><?= $siteName ?></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-flex flex-lg-row flex-column">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Product
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&PRODECT=fram">Frame</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&PRODECT=lens">Lens</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&PRODECT=contact">Contact Lens</a></li>
                        </ul>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            View Gender Colections
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&select=women">Women</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&select=men">Men</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&select=kids">KIDS</a></li>
                        </ul>
                        </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Collection
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&collection=new">New Collection</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&collection=last">Top Seller</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&collection=sell">Offers</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&collection=old">Clasic Collectins</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Types Collection
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&optian=sun_glasses">Sun Glasses</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&optian=eye_glasses">Eye Glasses</a></li>
                            <li><a class="dropdown-item" href="index.php?page=view_prodect&optian=klip_on">Klip On</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?page=learn">Learning</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-flex flex-lg-row flex-column">
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=dashboard"">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=logout">Log Out</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=login">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=Register">Register</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <button class="btn btn-outline-success" type="button">EN</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main >