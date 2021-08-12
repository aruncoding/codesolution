<?php
include "dbconnect.php";



        $id = $_GET['catid'];
        echo $id ;
        die();
        $sql = "SELECT * FROM `categories` WHERE category_id = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_discription'];
        }
    



$id = $_GET['category_id'];
$sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
$result = mysqli_query($conn, $sql);
$num_Rows = mysqli_num_rows($result);
$data = array();
if($num_Rows>1){
    while($row = mysqli_fetch_assoc($result)){
        $user_name = $row['thread_user_id'];
        $row2['user_email'] = $row['thread_cat_id'];
        $row1['category_id'] = $row['thread_cat_id'];
        $data[] = $row;
    }
}

// $sql = "SELECT * FROM `categories`";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $id = $row['category_id'];

// $sql2 = "select * from `users`";
// $result2 = mysqli_query($conn, $sql);
// $num_Rows1 = mysqli_num_rows($result);
// $data = array();
// if($num_Rows1>0){
//     while($row2 = mysqli_fetch_assoc($result2)){
// $data[] = $row2;
//     }
// }

// $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
// $result = mysqli_query($conn, $sql);



// // $id = $_GET['catid'];
// // $sql = "SELECT * FROM `categories` WHERE category_id = $id";
// // $result = mysqli_query($conn, $sql);






// $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";

// $result = mysqli_query($conn, $sql);
// $num_Rows = mysqli_num_rows($result);
// $data = array();
// if($num_Rows>0){
//         while($row = mysqli_fetch_assoc($result)){
// $data[] = $row;
//         }
// }
// Returning JSON Format data as Response to Ajax 
echo json_encode($data);



?>