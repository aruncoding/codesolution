<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "dbconnect.php";
    $email = $_POST['useremail'];
    $passs = $_POST['user_password'];

    $sql = "select * from users where user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $rows = mysqli_fetch_assoc($result);
        
        if(password_verify($passs, $rows['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $rows['sno'];
            $_SESSION['user_email'] = $email;
            echo "logged in". $email;
           
        }
        
        header("Location: /codesolution/index.php");
    }
    header("Location: /codesolution/index.php");
}





?>