<?php
require_once 'header.php';
?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Books</a></li>
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
                                            <th>Purchase Date</th>
                                            <th>Book Price</th>
                                            <th>Book Quantity</th>
                                            <th>Available Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM `books`");
                                        while ($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <td><?= $row['book_name'] ?></td>
                                                <td><img width="50" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                                <td><?= $row['book_author_name'] ?></td>
                                                <td><?= $row['book_genre'] ?></td>
                                                <td><?= $row['book_publication_name'] ?></td>
                                                <td><?=date('d-M-Y', strtotime( $row['book_purchase_date'] ))?></td>
                                                <td><?= $row['book_price'] ?></td>
                                                <td><?= $row['book_qty'] ?></td>
                                                <td><?= $row['available_qty'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $row['id'] ?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
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
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `books`");
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <!-- Book Info Modal -->
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
                                            <th>Purchase Date</th>
                                            <td><?=date('d-M-Y', strtotime( $row['book_purchase_date'] ))?></td>
                                        </tr>
                                        <tr>
                                            <th>Book Price</th>
                                            <td><?= $row['book_price'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Book Quantity</th>
                                            <td><?= $row['book_qty'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Available Quantity</th>
                                            <td><?= $row['available_qty'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
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


                <?php
                $result = mysqli_query($conn, "SELECT * FROM `books`");
                while ($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $book_info = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$id'");
                    $book_info_row = mysqli_fetch_assoc($book_info);
                ?>
                <!-- Update Book Info Modal -->
                <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-warning-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-warning">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-warning-label"><i class="fa fa-pencil"></i>Update Book Info</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                                    <h5 class="mb-lg text-center text-bold">Update Book</h5>
                                                    <div class="form-group">
                                                        <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= $book_info_row['book_name']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                                        <div class="col-sm-8">
                                                            <input type="file" class="form-control" id="book_image" name="book_image" placeholder="book_image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" >
                                                            <img width="50" src="../images/books/<?= $book_info_row['book_image']?>" alt="" id="output">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Author Name" value="<?= $book_info_row['book_author_name']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_genre" class="col-sm-4 control-label">Genre</label>
                                                        <div class="col-sm-8">
                                                            <select name="book_genre" id="book_genre" placeholder="select.." class="form-control selectpicker" data-live-search="true" value="<?= $book_info_row['book_genre']?>" required>
                                                                <option value="Art" label="Art">Art</option>
                                                                <option value="Biography" label="Biography">Biography</option>
                                                                <option value="Business" label="Business">Business</option>
                                                                <option value="Children's" label="AruChildren'sba">Children's</option>
                                                                <option value="Classics" label="Classics">Classics</option>
                                                                <option value="Comics" label="Comics">Comics</option>
                                                                <option value="Cookbooks" label="Cookbooks">Cookbooks</option>
                                                                <option value="Crime" label="Crime">Crime</option>
                                                                <option value="Fantasy" label="Fantasy">Fantasy</option>
                                                                <option value="Fiction" label="Fiction">Fiction</option>
                                                                <option value="Graphic Novel" label="Graphic Novel">Graphic Novel</option>
                                                                <option value="Historical Fiction" label="Historical Fiction">Historical Fiction</option>
                                                                <option value="History" label="History">History</option>
                                                                <option value="Horror" label="Horror">Horror</option>
                                                                <option value="Humor and Comedy" label="Humor and Comedy">Humor and Comedy</option>
                                                                <option value="Manga" label="Manga">Manga</option>
                                                                <option value="Music" label="Music">Music</option>
                                                                <option value="Mystery" label="Mystery">Mystery</option>
                                                                <option value="Nonfiction" label="Nonfiction">Nonfiction</option>
                                                                <option value="Paranormal" label="Paranormal">Paranormal</option>
                                                                <option value="Philosophy" label="Philosophy">Philosophy</option>
                                                                <option value="Poetry" label="Poetry">Poetry</option>
                                                                <option value="Psychology" label="Psychology">Psychology</option>
                                                                <option value="Religion" label="Religion">Religion</option>
                                                                <option value="Romance" label="Romance">Romance</option>
                                                                <option value="Science" label="Science">Science</option>
                                                                <option value="Science Fiction" label="Science Fiction">Science Fiction</option>
                                                                <option value="Self Help" label="Self Help">Self Help</option>
                                                                <option value="Short Stories" label="Short Stories">Short Stories</option>
                                                                <option value="Suspense" label="Suspense">Suspense</option>
                                                                <option value="Spirituality" label="Spirituality">Spirituality</option>
                                                                <option value="Sports" label="Sports">Sports</option>
                                                                <option value="Thriller" label="Thriller">Thriller</option>
                                                                <option value="Travel" label="Travel">Travel</option>
                                                                <option value="Young Adult" label="Young Adult">Young Adult</option>
                                                                <option value="Others" label="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Publication Name" value="<?= $book_info_row['book_publication_name']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Purchase Date" value="<?= $book_info_row['book_purchase_date']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book price" value="<?= $book_info_row['book_price']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?= $book_info_row['book_qty']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" value="<?= $book_info_row['available_qty']?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-4 col-sm-8">
                                                            <button type="submit" name="update_book" class="btn btn-warning"><i class="fa fa-save"></i> Update Book</button>
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
                <?php
                }

                if(isset($_POST['update_book'])){
                    $id = $book_info_row['id'];
                    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
                    $book_author_name = $_POST['book_author_name'];
                    $book_genre = mysqli_real_escape_string($conn, $_POST['book_genre']);
                    $book_publication_name = $_POST['book_publication_name'];
                    $book_purchase_date = $_POST['book_purchase_date'];
                    $book_price = $_POST['book_price'];
                    $book_qty = $_POST['book_qty'];
                    $available_qty = $_POST['available_qty'];
                    $librarian_username = $_SESSION['librarian_username'];
                
                    $image = explode('.',$_FILES['book_image']['name']);
                    $image_ext = end($image);
                    $image = date('Ymdhis.').$image_ext;
                
                    // $update_book = mysqli_query($conn, "UPDATE `books` SET `book_name`= `$book_name`,`book_image`=`$image`,`book_author_name`=`$book_author_name`,`book_publication_name`=`$book_publication_name`,`book_purchase_date`=`$book_purchase_date`,`book_price`=`$book_price`,`book_qty`=`$book_qty`,`available_qty`=`$available_qty`, `librarian_username`=`$librarian_username` WHERE `id` = '$id'");

                    $update_book = mysqli_query($conn, "UPDATE books SET book_name='$book_name', book_image='$image', book_author_name='$book_author_name', book_genre='$book_genre', book_publication_name='$book_publication_name', book_purchase_date='$book_purchase_date', book_price='$book_price', book_qty='$book_qty', available_qty='$available_qty', librarian_username='$librarian_username'  WHERE id = '$id'");
                
                    if($update_book){
                        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
                        $success = "Data Update successfully";
                       
                    }else{
                        $error = "Data not update";
                    }
                    
                }
                ?>

                <?php
                $result = mysqli_query($conn, "SELECT * FROM `books`");
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <!-- Delete Book Modal -->
                <div class="modal fade" id="delete-modal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-error-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-danger">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-error-label"><i class="fa fa-warning"></i>Delete Book</h4>
                            </div>
                            <div class="modal-body">
                                <h4 id="#deletesuccess">Are you sure you want to delete?</h4>
                               
                            </div>
                            <div class="modal-footer">
                                <a href="delete.php?bookdelete=<?= base64_encode($row['id']) ?>"><button type="button" class="btn btn-default" >Delete</button></a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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