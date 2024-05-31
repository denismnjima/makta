<?php 
//getting login processing file
include_once 'includes/login.inc.php';
session_start();
if(isset($_COOKIE['userid'])){
    $_SESSION['userid']=$_COOKIE['userid'];
    $_SESSION['position']=$_COOKIE['position'];
    $_SESSION['name']=$_COOKIE['name'];
    $_SESSION['email']=$_COOKIE['email'];
    $_SESSION['school']=$_COOKIE['school'];
}
if(isset($_SESSION['userid'])){
    if($_SESSION['position']=='admin'){
        header('Location:school/dashboard.php?response=already-logedin');
    }elseif($_SESSION['position']=='librarian'){
        header('Location:school/dashboard.php?response=already-logedin');
    }
    elseif($_SESSION['position']=='teacher'){
        header('Location:school/dashboard.php?response=already-logedin');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makta||Login</title>
    <link href="..hp/node_modules/material-design-icons/iconfont/material-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/login-style.css">
    <link rel="stylesheet" href="styles/login-styles-mobile.css">
</head>
<body class="login-page">
    <!-- Container containing login form and side image -->
    <section class="login-platform">
        <div class="design">
            <img src="images/login-vector.jpg" alt="" class="logo4">
            <h2>Welcome back!</h2>
            <p>Continue enjoying Makta</p>
        </div>
        <div class="login">
        
            <h2>Login</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="Enter email address">
                <input type="password" name="password" placeholder="Enter password">
                <div>
                <input type="checkbox" name="remember-me" id="remember-me">
                <label for="remember-me">Remember me</label>
                </div>
                <button class="login-btn" name="login_submit" type="submit">LOG IN <i class="material-icons md-30">chevron_right</i></button>
            </form>
            <?php
       //Checking if any error message is sent via post method
          if(isset($_GET['error'])){
             if($_GET['error']=='empty_fields'){
        echo '<div class="login-error-msg">
        <p>Please fill out all the fields!</p>
        <div class="error-msg-closebtn">
            <i class="material-icons md-14">close</i>
        </div>
    </div>';
             }
             elseif($_GET['error']=='wrong_input'){
                echo '<div class="login-error-msg">
                <p>Wrong email or password,check and resubmit to login!</p>
                <div class="error-msg-closebtn">
                    <i class="material-icons md-14">close</i>
                </div>
            </div>';

             }
             else{
                echo '<div class="login-error-msg">
                <p>Undefined error!</p>
                <div class="error-msg-closebtn">
                    <i class="material-icons md-14">close</i>
                </div>
            </div>';

             }
        };
        if(isset($_GET['logout'])){
            if($_GET['logout']=='successful'){
                echo '<div class="login-error-msg">
                <p>Succesfully loged-out!</p>
                <div class="error-msg-closebtn">
                    <i class="material-icons md-14">close</i>
                </div>
            </div>';
            }
        }


    ?>
        </div>
    </section>

    <!-- Javascript connection -->
    <script type="text/javascript" src="javascript/main.js"></script>
</body>
</html>