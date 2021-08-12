<?php
// $id = $_GET['catid'];
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'codesolution';
    
    $conn = mysqli_connect($server, $username, $password, $database);

    $success = '';
    $id = $_POST['catid'];
    $th_title = $_POST['title'];
    $th_desc = $_POST['message'];
    $sno = $_POST['sno'];

    $fname_error = '';
    
    $message_error = '';


    if(empty($th_title))
    {
        $fname_error = 'title is empty';
    }
   
    if(empty($th_desc))
    {
        $message_error = 'Message is empty';
        
    }

    if($fname_error == '' && $message_error == ''){

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        $success = 'your thread have been submit';
    }
    // header("Location: /codesolution/threadlist.php?catid=$id");
    $output = array(
        'success' => $success,
        'fname_error' => $fname_error,
       
        'message_error' => $message_error
    );
    echo json_encode($output);
   
}






?>