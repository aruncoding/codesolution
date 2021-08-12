<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $server = 'localhost';
   $user_name = 'root';
   $password = '';
   $database = 'codesolution';

   $conn = mysqli_connect($server, $user_name, $password, $database);

    $done = '';
    $messa = $_POST['message'];
    $sno = $_POST['sno'];
    $id = $_POST['threadid'];

    
    $comment_error = '';

    if(empty($messa)){
        $comment_error = 'Comment field is empty';
    }

    if($comment_error == ''){
        $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$messa', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        $done = "message send";
    }

    $output = array(
        'done' => $done,
        'comment_error' => $comment_error
    );

    echo json_encode($output);

}
?>