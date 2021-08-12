<!-- header section -->
<link rel="stylesheet" href="css/phone.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/all.css">
<script src="js/index.js"></script>
<script src="js/login.js"></script>
<script src="js/ajaxlogn.js"></script>
<?php
session_start();

echo 
'<nav class="navbar">
    <div class="container">
        <div class="logo">
            <a href="index.php">CodeSolution</a>
        </div>
    <div id="whole">
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#" class="down">Categories</a>
                    <div class="dropdown">
                        <a href="#">Python</a>
                        <a href="#">Javascript</a>
                        <a href="#">Java</a>
                        <a href="#">Css</a>
                    </div>
                </li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>';
        if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin'] == true){
        echo 
        '<div class="search_box">
            <form action="no-action" id="search_form">
                <input type="text" name="search" id="search">
                <button class="btn">Search</button>
                
                <p class="user_name">' . $_SESSION['user_email']. '</p>
                <a href="logout.php">Logout</a>
            </form>
        </div>';
        }
        else{
            echo '<div class="search_box">
                    <form action="no-action" id="search_form">
                        <input type="text" name="search" id="search">
                        <button class="btn">Search</button>
                    </form>
                </div>
                <div class="for_user">
        <button class="btn_login" onclick="lognino()">Login</button>
        <button class="btn_signup" onclick="sign()">Signup</button></div>';
        }
   echo '
   </div>
   </div>
   <div id="menu"></div>
    </nav>';

 include "login.php";
 include "signup.php";

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="singsucc">
    <p><strong>Signup Success!</strong> You can login Now!</p>
    <a class="bande" onclick="remov()"><i class="fas fa-times"></i></a>
  </div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"  && $_GET['error']=="2"){
    echo '<div class="passerror">
    <p><strong>Signup error!</strong> Password & ConfirmPassward not matched</p>
    <a class="bands" onclick="removedd()"><i class="fas fa-times"></i></a>
  </div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"  && $_GET['error']=="0"){
    echo '<div class="emailexti">
    <p><strong>Signup error!</strong> email already exit</p>
    <a class="band" onclick="removed()"><i class="fas fa-times"></i></a>
  </div>';
}
?>