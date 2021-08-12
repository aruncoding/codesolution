<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "dbconnect.php";
    $email = $_POST['useremail'];
    $passs = $_POST['user_password'];

    $soccess = '';
    $email_err = '';
    $passw_err = '';

    if(empty($email)){
        $email_err = 'Email field is empty';
    }
    if(empty($passs)){
        $passw_err = 'Password Field is empty';
    }

    if($email_err == '' && $passw_err == ''){
        $sql = "select * from users where user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $rows = mysqli_fetch_assoc($result);
        
        if(password_verify($passs, $rows['user_pass'])){
            $soccess = 'Email successful';
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

    $soutput = array(
        'soccess' => $soccess,
        'email_err' => $email_err,
        'passw_err' => $passw_err
    );
    echo json_encode($soutput);
}





?>