<?php
require_once 'header.php';

if(isset($_POST['issue_book'])){
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];


    $result = mysqli_query($conn, "INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id', '$book_id', '$book_issue_date')");

    

    if($result){
        mysqli_query($conn, "UPDATE `books` SET `available_qty`= `available_qty`-1 WHERE `id` = '$book_id'");
        ?>
        <script type="text/javascript">
            alert("success");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("not success");
        </script>
        <?php
    }
    
}
?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Issue Book</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-inline" method="POST">
                                            <div class="form-group">
                                                <select class="form-control" name="student_id">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `status` = '1'");
                                                    while ($row = mysqli_fetch_assoc($result)){?>
                                                    <option value="<?= $row['id'] ?>"><?= ucwords($row['fname']).' '. ucwords($row['lname']).' - ( '.$row['roll'].')'?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                                if(isset($_POST['search'])){
                                    $id = $_POST['student_id'];
                                    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1'");
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="panel">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="POST">
                                                        <div class="form-group">
                                                            <label for="name">Student Name</label>
                                                            <input type="text" class="form-control" value="<?= ucwords($row['fname']).' '. ucwords($row['lname']) ?>" readonly>
                                                            <input type="hidden" class="form-control" value="<?= $row['id'] ?>" name="student_id" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Book Name</label>
                                                            <select class="form-control" name="book_id">
                                                                <option value="">Select</option>
                                                                <?php
                                                                $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `available_qty` > 0");
                                                                while ($row = mysqli_fetch_assoc($result)){?>
                                                                <option value="<?= $row['id'] ?>"><?= $row['book_name']?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Book Issue Date</label>
                                                            <input type="text" name="book_issue_date" class="form-control" value="<?= date('d-m-Y') ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="issue_book" class="btn btn-primary">Save Issue</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                    
<?php
require_once 'footer.php';
?>