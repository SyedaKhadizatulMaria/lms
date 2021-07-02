<?php 
require_once 'dbcon.php';

if(isset($_GET['id'])){
    $book_details_id = $_GET['id'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Fontawesome css -->
    <link rel="stylesheet" href="fonts/all.min.css">
    <link rel="stylesheet" href="fonts/fontawesome.min.css">

    <!-- flaticon css -->
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css">
</head>
</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg bg-dark ftco-navbar-dark navbar-fixed-top book_details_nav">
            <div class="container-xl ">
                <a class="navbar-brand align-items-center text-white" href="index.html">
                Libronia
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars text-white"></span> 
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 main-nav-menu">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="causes.html">News & Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">sign in/register</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </section>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-4 text-center">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$book_details_id'");
                    while ($row = mysqli_fetch_assoc($result)){?>
                        <img class="book_details_image" src="images/books/<?= $row['book_image'] ?>" alt="">
                        <p class="text-left mt-2"><b>Publisher:</b> <?= ucwords($row['book_publication_name'])?></p>
                        <?php 
                    }
                    ?>
                </div>
                <div class="col-8">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$book_details_id'");
                    while ($row = mysqli_fetch_assoc($result)){?>
                        <h1 class="text-left"><?= ucwords($row['book_name'])?></h1>
                        <p class="text-left">by <span class="text-primary text-bold"><?= ucwords($row['book_author_name'])?></span></p>
                        <span class="badge" ><?=  $row['book_genre']?></span>
                        <?php 
                    }
                    ?>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid distinctio, rerum ipsa numquam dignissimos dicta iure nostrum accusantium aut rem aspernatur quidem eligendi neque tempora hic maxime, est perspiciatis animi.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid distinctio, rerum ipsa numquam dignissimos dicta iure nostrum accusantium aut rem aspernatur quidem eligendi neque tempora hic maxime, est perspiciatis animi.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid distinctio, rerum ipsa numquam dignissimos dicta iure nostrum accusantium aut rem aspernatur quidem eligendi neque tempora hic maxime, est perspiciatis animi.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid distinctio, rerum ipsa numquam dignissimos dicta iure nostrum accusantium aut rem aspernatur quidem eligendi neque tempora hic maxime, est perspiciatis animi.
                    </p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">
                                <div class="avalability text-center">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$book_details_id'");
                                    while ($row = mysqli_fetch_assoc($result)){?>
                                        <?php
                                    if($row['available_qty'] > 0){
                                        ?>
                                            <p>Available</p>
                                        <?php
                                    }else{
                                        ?>
                                            <p>Unavailable</p>
                                        <?php
                                    }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="price_tag text-center">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$book_details_id'");
                                    while ($row = mysqli_fetch_assoc($result)){?>
                                        <p><?= $row['book_price'] ?> tk</p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
