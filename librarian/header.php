<?php
$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);

require_once '../dbcon.php';

session_start();

if(!isset($_SESSION['librarians_login'])){
    header('location: sign-in.php');
}

$librarians_login = $_SESSION['librarians_login'];
$data = mysqli_query($conn,"SELECT * FROM `librarians` WHERE `email` = '$librarians_login' OR `username` = '$librarians_login'");

$librarians_info = mysqli_fetch_assoc($data);

?>

<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Management System</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/logo.png">
    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <!-- <a href="index.html" class="on-click">
                        <img alt="logo" src="../assets/images/header-logo.png" />
                    </a> -->
                    <h3 class="color-light">LMS</h3>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                <!-- <div class="header-section hidden-xs" id="notice-headerbox">

                    <div class="header-separator"></div>
                </div> -->
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="../assets/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords ($librarians_info['fname'].' '. $librarians_info['lname'])?></span>
                            <span class="user-profile">Librarian</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title"></div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item': ''?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--Students-->
                                <li class="<?= $page == 'students.php' ? 'active-item': ''?>"><a href="students.php"><i class="fa fa-users" aria-hidden="true"></i><span>Students</span></a></li>
                                <!--Manage BOOKS-->
                                <li class="has-child-item close-item <?= $page == 'add-books.php' ? 'open-item': ''?> <?= $page == 'manage-books.php' ? 'open-item': ''?>">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'add-books.php' ? 'active-item': ''?>"><a href="add-books.php">Add Books</a></li>
                                        <li class="<?= $page == 'manage-books.php' ? 'active-item': ''?>"><a href="manage-books.php">Manage Books</a></li>
                                    </ul>
                                </li>
                                <!--Issue Book-->
                                <li class="<?= $page == 'issue-book.php' ? 'active-item': ''?>"><a href="issue-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                                <!--Return Book-->
                                <li class="<?= $page == 'return-book.php' ? 'active-item': ''?>"><a href="return-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">