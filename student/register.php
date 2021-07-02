<?php

require_once '../dbcon.php';

session_start();

if(isset($_SESSION['student_login'])){
    header('location: index.php');
}

if(isset($_POST['student_register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $phone = $_POST['phone'];

    $input_errors = array();

    if(empty($fname)){
        $input_errors['fname'] = "First name field is required!";
    }
    if(empty($lname)){
        $input_errors['lname'] = "Last name field is required!";
    }
    if(empty($email)){
        $input_errors['email'] = "Email field is required!";
    }
    if(empty($username)){
        $input_errors['username'] = "Username field is required!";
    }
    if(empty($pw)){
        $input_errors['pw'] = "Password field is required!";
    }
    if(empty($roll)){
        $input_errors['roll'] = "Roll field is required!";
    }
    if(empty($reg)){
        $input_errors['reg'] = "Registration No field is required!";
    }
    if(empty($phone)){
        $input_errors['phone'] = "Mobile Number field is required!";
    }


    if (count($input_errors) == 0){

        $email_check = mysqli_query($conn, "SELECT * FROM `students` WHERE `email` = '$email'");
        $email_check_row = mysqli_num_rows($email_check);

        if($email_check_row == 0){
            $username_check = mysqli_query($conn, "SELECT * FROM `students` WHERE `username` = '$username'");
            $username_check_row = mysqli_num_rows($username_check);
   
            if($username_check_row == 0){
                if(strlen($username) > 5){
                   if(strlen($pw) > 6){
                    
                    $password_hash = password_hash($pw, PASSWORD_DEFAULT);

                    $result = mysqli_query($conn, "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `pw`, `status`, `phone`) VALUES ('$fname', '$lname', '$roll', '$reg', '$email', '$username', '$pw', '0', '$phone')");
            
                    if ($result){
                        $success = "Registration Successfully!";
                    }
                    else{
                        $error = "Something Wrong!";
                    }

                   }
                   else{
                       $password_error = "Password should be more than 8 characters!";
                   }
                }
                else{
                   $username_exits = "Username should be more than 6 characters";
                }
               
           }
            else{
                $username_exits = "This username is already exits";
            }
        }
         else{
             $email_exits = "This email is already exits";
         }




}

    // $result = $conn->query($sql);

}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo text-center">
           <h2>Student Registration</h2>
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

            <?php        
            if(isset($email_exits)){
                ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $email_exits ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }  
           ?>

            <?php        
            if(isset($username_exits)){
                ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $username_exits ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }  
           ?>

            <?php        
            if(isset($password_error)){
                ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $password_error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }  
           ?>

           
           
        </div>
        
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value= <?= isset($fname) ? $fname : '' ?>>
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['fname'])){
                                    echo '<span class="input-error">'.$input_errors ['fname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value= <?= isset($lname) ? $lname : '' ?>>
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['fname'])){
                                    echo '<span class="input-error">'.$input_errors ['lname'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value= <?= isset($email) ? $email : '' ?>>
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['email'])){
                                    echo '<span class="input-error">'.$input_errors ['email'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll" name="roll" pattern="[0-9]{6}" value= <?= isset($roll) ? $roll : '' ?>>
                                <i class="fa fa-university"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['roll'])){
                                    echo '<span class="input-error">'.$input_errors ['roll'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg No" name="reg" pattern="[0-9]{6}" value= <?= isset($reg) ? $reg : '' ?>>
                                <i class="fa fa-university"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['reg'])){
                                    echo '<span class="input-error">'.$input_errors ['reg'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01*********" name="phone" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" value= <?= isset($phone) ? $phone : '' ?>>
                                <i class="fa fa-mobile"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['phone'])){
                                    echo '<span class="input-error">'.$input_errors ['phone'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="username" value= <?= isset($username) ? $username : '' ?>>
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['username'])){
                                    echo '<span class="input-error">'.$input_errors ['username'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="pw" value= <?= isset($pw) ? $pw : '' ?>>
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                if(isset($input_errors['pw'])){
                                    echo '<span class="input-error">'.$input_errors ['pw'].'</span>';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
