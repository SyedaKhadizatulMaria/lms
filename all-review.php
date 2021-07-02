<?php 
require_once 'dbcon.php';

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
        <div class="all_book_review">
        <h3 class="mt-5 text-center mb-4">Book Review</h3>
            <div class="container-fluid mx-auto d-flex flex-column justify-content-cebter">
                <div class="row mx-auto">
                    <div class="col-10 mx-auto">
                        <?php
                        $result = mysqli_query($conn, "SELECT books.id, books.book_name, books.book_image, books.book_author_name, students.id, students.fname, students.lname, book_reviews.id, book_reviews.title, book_reviews.content, book_reviews.rating, book_reviews.created_at
                        FROM ((books
                        INNER JOIN book_reviews ON book_reviews.book_id = books.id)
                        INNER JOIN students ON students.id = book_reviews.student_id)
                        ORDER BY created_at DESC ");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book_review.php?id=<?= $row['id'] ?>" target="_blank">
                            <div class="card mb-3 w-75">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img class="all_book_review_image" src="images/books/<?= $row['book_image'] ?>" alt="">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['title']?></h5>
                                        <p class="card-text">by <?= ucwords($row['fname'].' '.$row['lname'])?></p>
                                        <p class="card-text"><?= substr($row['content'], 0, 500); ?></p>
                                        <p class="card-text"><small class="text-muted">Posted On <?= date('d-M-y H:i:s', strtotime($row['created_at'])) ?></small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
