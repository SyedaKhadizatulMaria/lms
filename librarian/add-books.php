<?php
require_once 'header.php';

if(isset($_POST['save_book'])){
    
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

    $result = mysqli_query($conn, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_genre`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name', '$image', '$book_author_name', '$book_genre', '$book_publication_name', '$book_purchase_date', '$book_price', '$book_qty', '$available_qty', '$librarian_username')");

    if($result){
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $success = "Data save successfully";
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
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
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                            <h5 class="mb-lg">Add Book</h5>
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control" id="book_image" name="book_image" placeholder="book_image" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Author Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_genre" class="col-sm-4 control-label">Genre</label>
                                                <div class="col-sm-8">
                                                    <select name="book_genre" id="book_genre" placeholder="select.." class="form-control selectpicker" data-live-search="true" required>
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
                                                    <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Publication Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Purchase Date" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book price" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    

<?php
require_once 'footer.php';
?>