<?php

require_once 'header.php';
require_once '../dbcon.php';

if(isset($_POST['submit_review'])){

    $book_id = $_POST['book_id'];
    $student_id = $_POST['student_id'];
    $title = $_POST['title'];
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $rating = $_POST['rating'];

    $result = mysqli_query($conn, "INSERT INTO book_reviews(`book_id`, `student_id`, `title`, `content`, `rating`) VALUES ('$book_id', '$student_id', '$title', '$content', '$rating')");

    if($result){
        $success = "Data save successfully";
        ?>
        <script type="text/javascript">
            javascript:history.go(-1);
        </script>
    <?php
    }else{
        $error = "Data not save";
    }
    
}


?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <?php        
                    if(isset($success)){
                        ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?= $success ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }  
                   ?>
                    <?php        
                    if(isset($error)){
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $error ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }  
                    ?>
                    <h4 class="section-subtitle"><b>Books</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Book Name</th>
                                            <th>Book Image</th>
                                            <th>Author Name</th>
                                            <th>Genre</th>
                                            <th>Publication Name</th>
                                            <th>Book Price</th>
                                            <th>Available Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM `books`");
                                        while ($row = mysqli_fetch_assoc($result)){
                                            ?>
                                                <tr class='clickable-row' data-toggle="modal" data-target="#book-<?= $row['id'] ?>">
                                                    <td><?= $row['book_name'] ?></td>
                                                    <td><img width="50" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                                    <td><?= $row['book_author_name'] ?></td>
                                                    <td><?= $row['book_genre'] ?></td>
                                                    <td><?= $row['book_publication_name'] ?></td>
                                                    <td><?= $row['book_price'] ?></td>
                                                    <td><?= $row['available_qty'] ?></td>
                                                </tr>
                                            
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Info Modal -->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `books`");
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Book Name</th>
                                            <td><?= $row['book_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Book Image</th>
                                            <td><img width="50" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th>Author Name</th>
                                            <td><?= $row['book_author_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Genre</th>
                                            <td><?= $row['book_genre'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Publication Name</th>
                                            <td><?= $row['book_publication_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Book Price</th>
                                            <td><?= $row['book_price'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Available Quantity</th>
                                            <td><?= $row['available_qty'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-wide btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#book_review_<?= $row['id'] ?>">Write Review</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- Write Reviw -->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `books`");
                while ($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $book_write_review= mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$id'");
                    $book_write_review_row = mysqli_fetch_assoc($book_write_review);
                ?>
                <div class="modal fade" id="book_review_<?= $book_write_review_row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-pencil"></i>Write Book Review</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="" width="50" src="../images/books/<?= $book_write_review_row['book_image'] ?>" alt="">
                                        </div>
                                        <div class="col-7">
                                            <h3>Leave a review</h3>
                                            <div class="panel">
                                                <div class="panel-content">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <form class="my-2" action="" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="rating" class="col-sm-4 control-label">Rating</label>
                                                                        <select class="col-4" name="rating" id="rating" placeholder="select.." class="form-control selectpicker"  required>
                                                                            <option value="1" label="1">1</option>
                                                                            <option value="2" label="2">2</option>
                                                                            <option value="3" label="3">3</option>
                                                                            <option value="4" label="4">4</option>
                                                                            <option value="5" label="5">5</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="title" class="control-label">Title</label>
                                                                    <textarea type="text" class="form-control" id="title" name="title" placeholder="Write a title" ></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="review" class="control-label">Write a review</label>
                                                                    <textarea type="text" rows="10" class="form-control" id="title" name="content" placeholder="Write a review here" ></textarea>
                                                                </div>

                                                                <input type="hidden" name="book_id" value="<?= $book_write_review_row['id'] ?>" readonly>

                                                                <input type="hidden" 
                                                                 name="student_id" value="<?= $students_info['id'] ?>" readonly>

                                                                <div class="form-group">
                                                                    <div class="col-sm-offset-4 col-sm-8">
                                                                        <button type="submit" name="submit_review" class="btn btn-primary"><i class="fa fa-save"></i> Submit Review</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

<?php
require_once 'footer.php';
?>