<?php 

require_once 'dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>

    <link rel="icon" href="images/logo.png" type="image/icon type">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Fontawesome css -->
    <link rel="stylesheet" href="fonts/all.min.css">
    <link rel="stylesheet" href="fonts/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- flaticon css -->
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header>
            <nav class="navbar navbar-expand-lg  ftco-navbar-light navbar-fixed-top main_navbar" id="top_navbar">
                <div class="container-xl ">
                    <img class="logo pr-2" src="images/logo.png" alt="">
                    <a class="navbar-brand align-items-center text-white" href="index.html">
                    Libronia
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars text-white"></span> 
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 main-nav-menu top_navbar-right">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#all_book">All Books</a></li>
                            <li class="nav-item"><a class="nav-link" href="#book_review">Book Review</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="signin-reg.php" target="_blank">Log in/Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="main_section">
                <div class="overlay">
                </div>
                <div class="container-fluid main_div">
                    <div class="row">
                        <div class="col-6 mx-auto my-auto">
                            <h2 class="text-white mx-auto text-center">
                            DISCOVER YOUR ROOTS
                            </h2>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-8 mx-auto my-auto">
                            <p class="text-white text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 join_contact text-center mx-auto my-auto">
                            <button class="btn  join-us mx-auto mt-2">Join Us</button>
                            <button class="btn contact-us mx-auto mt-2">Contact</button>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <div class="about" id="about">
            <div class="container-fluid p-0">
                <div class="row p-0 m-0">
                    <div class="col-lg-6 col-sm-10 mt-2 welcome_about">
                        <h1 class="pt-5">
                        WELCOME TO THE LIBRARIA
                        </h1>
                        <i class="flaticon-minus" style="color:yellow;"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero culpa, ducimus magnam ut necessitatibus dolore consectetur, harum possimus ab obcaecati assumenda nobis autem delectus hic tenetur magni perferendis doloribus soluta. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat nam odio rerum omnis voluptatem, illo dolorum laboriosam id non necessitatibus velit hic cum, suscipit quibusdam qui minima incidunt voluptatibus corporis dolor ex doloremque sequi in blanditiis amet? Sint quos exercitationem aspernatur libero est eius nesciunt et? A esse assumenda itaque.</p>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <?php            
                            $books = mysqli_query($conn,"SELECT * FROM `books`");
                            $total_books = mysqli_num_rows($books);
                        ?>
                        <div class="box books">
                            <div class="under-box text-center">
                                <i class="flaticon-book fa-2x text-white"></i><br>
                                <h6 class="text-white">Total Books</h6>
                                <span class="text-white"><?= $total_books ?></span>
                            </div>
                        </div>
                        <div class="box genre">
                            <div class="under-box text-center">
                                <i class="flaticon-letter fa-2x text-white"></i><br>
                                <h6 class="text-white">Total Genre</h6>
                                <span class="text-white">100</span>
                            </div>
                        </div>
                        <?php            
                            $students = mysqli_query($conn,"SELECT * FROM `students`");
                            $total_members = mysqli_num_rows($students);
                        ?>
                        <div class="box members">
                            <div class="under-box text-center">
                                <i class="flaticon-members-only fa-2x text-white"></i><br>
                                <h6 class="text-white">Total Members</h6>
                                <span class="text-white"><?= $total_members ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mt-2">
                        <div class="side-img">
                            <img src="images/books-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-genre" id="all_book">
            <div class="container-fluid mt-3 pb-5 bg-dark">
                <div class="row ">
                    <div class="col-8 mx-auto">
                        <h3 class="text-center text-white mt-4 mb-2">All Avalable Genre Books</h3>
                        <p class="text-center mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum architecto et natus voluptatibus voluptate amet, beatae saepe ipsam voluptas incidunt, aliquid velit esse, labore sapiente expedita. Sint odit corporis consequuntur?</p>
                    </div>
                </div>
                <div class="row d-flex align-items-start mx-0 no_margin">
                    <div class="col-12 col-md-3 mx-0 nav flex-md-column flex-row mb-4 mb-md-0 nav-pills me-3 tab_right_box" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-all-genre-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all-genre" type="button" role="tab" aria-controls="v-pills-all-genre" aria-selected="true">All Genre</button>

                        <button class="nav-link" id="v-pills-crime-tab" data-bs-toggle="pill" data-bs-target="#v-pills-crime" type="button" role="tab" aria-controls="v-pills-crime" aria-selected="false">Crime</button>

                        <button class="nav-link" id="v-pills-fantasy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fantasy" type="button" role="tab" aria-controls="v-pills-fantasy" aria-selected="false">Fantasy</button>

                        <button class="nav-link" id="v-pills-fiction-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fiction" type="button" role="tab" aria-controls="v-pills-fiction" aria-selected="false">Fiction</button>

                        <button class="nav-link" id="v-pills-historical-fiction-tab" data-bs-toggle="pill" data-bs-target="#v-pills-historical-fiction" type="button" role="tab" aria-controls="v-pills-historical-fiction" aria-selected="false">Historical Fiction</button>

                        <button class="nav-link" id="v-pills-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-history" type="button" role="tab" aria-controls="v-pills-history" aria-selected="false">History</button>

                        <button class="nav-link" id="v-pills-horror-tab" data-bs-toggle="pill" data-bs-target="#v-pills-horror" type="button" role="tab" aria-controls="v-pills-horror" aria-selected="false">Horror</button>

                        <button class="nav-link" id="v-pills-thriller-tab" data-bs-toggle="pill" data-bs-target="#v-pills-thriller" type="button" role="tab" aria-controls="v-pills-thriller" aria-selected="false">Thriller</button>
                        
                    </div>
                    <div class="col-12 col-md-8 mx-0 tab-content text-center" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-all-genre" role="tabpanel" aria-labelledby="v-pills-all-genre-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-crime" role="tabpanel" aria-labelledby="v-pills-crime-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'crime' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-fantasy" role="tabpanel" aria-labelledby="v-pills-fantasy-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'fantasy' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-fiction" role="tabpanel" aria-labelledby="v-pills-fiction-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'fiction' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-historical-fiction" role="tabpanel" aria-labelledby="v-pills-historical-fiction-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'historical fiction' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'history' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-horror" role="tabpanel" aria-labelledby="v-pills-horror-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'horror' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-thriller" role="tabpanel" aria-labelledby="v-pills-thriller-tab">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_genre` = 'thriller' LIMIT 20");
                        while ($row = mysqli_fetch_assoc($result)){?>
                        <a href="book-details.php?id=<?= $row['id'] ?>" target="_blank">
                        <img class="show_books" src="images/books/<?= $row['book_image'] ?>" alt=""></a>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_book_review" id="book_review">
            <div class="container-fluid  mx-auto">
                <div class="row ">
                    <div class="col-8 mx-auto">     
                        <h3 class="mt-5 text-center mb-2">Book Review</h3>
                        <p class="mt-2 text-center mb-5 px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, corporis! Quibusdam quidem adipisci numquam culpa autem facere, vitae repellat, eligendi maiores non molestiae qui accusantium voluptates voluptatem et, quis unde!</p>
                    </div>
                </div>
                <div class="row mx-auto d-flex justify-content-around">
                    <div class="col-lg-3 col-md-5 col-sm-10">
                        <div class="card review_box bg-dark" style="width: 20rem;  border: 2px solid #ffc947 !important">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM book_reviews");
                            $row = mysqli_num_rows($result);
                            $nth_num = $row-1;
                            $result2 = mysqli_query($conn, "SELECT * FROM book_reviews ORDER BY id LIMIT $nth_num,1");
                            $abc = mysqli_fetch_assoc($result2);
                            $book_review_id = $abc['id'];

                            $result3 = mysqli_query($conn, "SELECT books.id, books.book_name, books.book_image, books.book_author_name, books.book_genre, students.id, students.fname, students.lname, book_reviews.id, book_reviews.title, book_reviews.content, book_reviews.rating
                            FROM ((books
                            INNER JOIN book_reviews ON book_reviews.book_id = books.id)
                            INNER JOIN students ON students.id = book_reviews.student_id)
                            WHERE book_reviews.id = $book_review_id");

                            $xyz = mysqli_fetch_assoc($result3);

                            ?>
                            <img src="images/books/<?= $xyz['book_image']?>" class="card-img-top mt-3" alt="...">
                            <div class="card-body read_more">
                                <span class="badge" ><?=  $xyz['book_genre']?></span>
                                <h5 class="card-title text-white"><?= $xyz['title']?></h5>
                                <p class="card-text text-white"><?= substr($xyz['content'], 0, 100); ?>...</p>
                                <a href="book_review.php?id=<?= $book_review_id ?>" target="_blank" class="">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-10">
                        <div class="card  bg-dark review_box" style="width: 20rem;  border: 2px solid #ffc947 !important">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM book_reviews");
                            $row = mysqli_num_rows($result);
                            $nth_num = $row-2;
                            $result2 = mysqli_query($conn, "SELECT * FROM book_reviews ORDER BY id LIMIT $nth_num,1");
                            $abc = mysqli_fetch_assoc($result2);
                            $book_review_id = $abc['id'];

                            $result3 = mysqli_query($conn, "SELECT books.id, books.book_name, books.book_image, books.book_author_name, books.book_genre, students.id, students.fname, students.lname, book_reviews.id, book_reviews.title, book_reviews.content, book_reviews.rating
                            FROM ((books
                            INNER JOIN book_reviews ON book_reviews.book_id = books.id)
                            INNER JOIN students ON students.id = book_reviews.student_id)
                            WHERE book_reviews.id = $book_review_id");

                            $xyz = mysqli_fetch_assoc($result3);
                            ?>
                            <img src="images/books/<?= $xyz['book_image']?>" class="card-img-top mt-3" alt="...">
                            <div class="card-body read_more">
                                <span class="badge" ><?=  $xyz['book_genre']?></span>
                                <h5 class="card-title text-white"><?= $xyz['title']?></h5>
                                <p class="card-text text-white"><?= substr($xyz['content'], 0, 100); ?>...</p>
                                <a href="book_review.php?id=<?= $book_review_id ?>" target="_blank" class="">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-10">
                        <div class="card bg-dark review_box" style="width: 20rem;  border: 2px solid #ffc947 !important">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM book_reviews");
                            $row = mysqli_num_rows($result);
                            $nth_num = $row-3;
                            $result2 = mysqli_query($conn, "SELECT * FROM book_reviews ORDER BY id LIMIT $nth_num,1");
                            $abc = mysqli_fetch_assoc($result2);
                            $book_review_id = $abc['id'];

                            $result3 = mysqli_query($conn, "SELECT books.id, books.book_name, books.book_image, books.book_author_name, books.book_genre, students.id, students.fname, students.lname, book_reviews.id, book_reviews.title, book_reviews.content, book_reviews.rating
                            FROM ((books
                            INNER JOIN book_reviews ON book_reviews.book_id = books.id)
                            INNER JOIN students ON students.id = book_reviews.student_id)
                            WHERE book_reviews.id = $book_review_id");

                            $xyz = mysqli_fetch_assoc($result3);
                            ?>
                                <img src="images/books/<?= $xyz['book_image']?>" class="card-img-top mt-3" alt="...">
                                <div class="card-body read_more">
                                    <span class="badge" ><?=  $xyz['book_genre']?></span>
                                    <h5 class="card-title text-white"><?= $xyz['title']?></h5>
                                    <p class="card-text text-white"><?= substr($xyz['content'], 0, 100); ?>...</p>
                                    <a href="book_review.php?id=<?= $book_review_id ?>" target="_blank" class="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid my-5">
                    <div class="row text-center">
                        <div class="col-12 all_review_btn">
                            <a href="all-review.php" target="_blank" class="btn text-center all_review">See All Review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Site footer -->
        <footer class="site-footer" id="contact">
            <div class="container">
                <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In labore officiis hic consequuntur architecto commodi fugit blanditiis nihil porro, impedit aut adipisci vel minima dolores eius sunt quidem nam amet?</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                    <li><a href="#">Horror</a></li>
                    <li><a href="#">Thriller</a></li>
                    <li><a href="#">Children</a></li>
                    <li><a href="#">Fantasy</a></li>
                    <li><a href="#">Non Fiction</a></li>
                    <li><a href="#">Romance</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#all_book">All Book</a></li>
                    <li><a href="#book_review">Book Review</a></li>
                    <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
                <a href="#">Syeda Khadizatul Maria</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>   
                    </ul>
                </div>
                </div>
            </div>
        </footer>
    </div>



<script>


// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("top_navbar").style.padding = "10px 10px";
    document.getElementById("top_navbar").style.backgroundColor = "#212529";
  } else {

    document.getElementById("top_navbar").style.background = "transparent";
  }
}
</script>




    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>