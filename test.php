<?php
require_once '../dbcon.php';
session_start();

if(isset($_SESSION['student_login'])){
    header('location: index.php');
}

if(isset($_POST['student_login'])){
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $result = mysqli_query($conn, "SELECT * FROM `students` WHERE `email`= '$email'OR `username`= '$email'");
    

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($pw == $row['pw']){
            if($row['status'] == 1){
               $_SESSION['student_login'] = $email;
               $_SESSION['student_id'] = $row['id'];
               header('location: index.php');
            }
            else{
                $error = "Your Status is inactive!";
            }
        }
        else{
            $error = "Your entered password is wrong!";
            
        }
    }
    else{
        $error = "Email or Username is invalid";
    }
   
}

?>


<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style type="text/css">
 
body{
  background-image: url(http://www.joburgchiropractor.co.za/images/background.jpg);
}
</style>

</head>
<body>

<!-- if you want to create login page and register page together in one page ...you have to only chnage his name...that's it...                 -->
<div class="container" style="margin-top: 5%;">
    <div class="row">
        <div class="col-sm-4"> </div>
        <div class="col-md-4">
            <h1 class="text-center text-success"> Register page</h1>
            <br/>
            <div class="col-sm-12">
                <ul class="nav nav-pills" >
                    <li class="" style="width:50%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#home">Doctor</a></li>
                    <li class=" " style="width:48%"><a class=" btn btn-lg btn-default" data-toggle="tab" href="#menu1">patient</a></li>
                </ul><br/>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <form action="#">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <button type="submit" class="btn btn-default btn-lg">Submit</button>
                        <button type="submit" class=" pull-right btn-link"><a href="www.google.com">Forget password</a></button>
                    </form><br/>
                    <a href="#" class="pull-right btn btn-block btn-danger" > Already Register ?   </a>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <form action="#">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <button type="submit" class="btn btn-default" name="student_login">Submit</button>
                        <button type="submit" class=" pull-right btn-link"><a href="www.google.com">Forget password</a></button>
                    </form><br/>
                    <a href="#" class="pull-right btn btn-block btn-success" > Already Register ?   </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- This design is created by manoj chauhan  -->
</body>
</html>
