<?php
// $showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $user_email = $_POST['useremail'];
    $pass = $_POST['user_password'];
    $cpass = $_POST['cuser_password'];

    $success = '';
    $email_error = '';
    $pass_error = '';
    $cpass_error = '';

    if(empty($user_email)){
        $email_error = 'email field is empty';
    }
    if(empty($pass)){
        $pass_error = 'password is empty';
    }
    if(empty($cpass)){
        $cpass_error = 'confirm password is empty';
    }

    if($email_error =='' && $pass_error == '' && $cpass_error == ''){
       // check weather this email exits
    $existSql = "SELECT * FROM `users` where user_email = '$user_email'";
    //below code is to run the sql querry
    $result = mysqli_query($conn, $existSql);
    //it gives us the row from the database
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
        // $status = 0;
    }
    
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            //below code is to run the sql querry
            $result = mysqli_query($conn, $sql);
            $success = 'signup successfull';
            
            // if($result){
            //     $showAlert = true;
            //     $status = 1;
            //     //after signup redirect to below page
            //     header("Location: /codesolution/index.php?signupsuccess=true");
            //     exit();
            // }

        }
        // else{
        //     $showError = "Passwords do not match";
        //     $status = 2;
            
           
        // }
    }
    // header("Location: /codesolution/index.php?signupsuccess=false&error=$status");
 } 

 $output = array(
    'success' => $success,
    'email_error' => $email_error,
    'pass_error' => $pass_error,
    'cpass_error' => $cpass_error
 );
 echo json_encode($output);

    
   
   

}


?>