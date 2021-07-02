<?php
require_once 'header.php';
?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <div class="row">
                            <!--Total Student BOX  -->
                            <?php            
                            $students = mysqli_query($conn,"SELECT * FROM `students`");
                            $total_students = mysqli_num_rows($students);
                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-darker-1">
                                    <a href="students.php">
                                        <div class="panel-content">
                                            <h4 class=" color-w"><i class="fa fa-users"></i> Total Students</h4>
                                            <h4 class="subtitle color-lighter-1"><?= $total_students?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--Total Book Box-->
                            <?php
                            $books = mysqli_query($conn,"SELECT * FROM `books`");
                            $total_books = mysqli_num_rows($books);

                            $qty = mysqli_query($conn,"SELECT SUM(`book_qty`) as total FROM `books`");
                            $book_qty = mysqli_fetch_assoc($qty);

                            $qty_a = mysqli_query($conn,"SELECT SUM(`available_qty`) as total FROM `books`");
                            $book_qty_a = mysqli_fetch_assoc($qty_a);

                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                                    <a href="manage-books.php">
                                        <div class="panel-content">
                                            <h4 class=" color-light-1"> <i class="fa fa-books"></i> <?= $total_books?> ( <?= $book_qty['total']?> - <?= $book_qty_a['total']?> )</h4>
                                            <h6 class="">Total Books (total qty - available qty)</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 1-->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="#">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-user"></i> 105 </h1>
                                            <h4 class="subtitle color-darker-1">New Users</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 1-->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                                    <a href="#">
                                        <div class="panel-content">
                                            <h1 class="title"> Total </h1>
                                            <h4 class="subtitle">$14.550,00</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
<?php
require_once 'footer.php';
?>