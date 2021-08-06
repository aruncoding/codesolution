<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thread.css">
    <link rel="stylesheet" href="css/all.css">
    <title>CodeSolution</title>
    <?php
         include ("dbconnect.php");
        $showAlert = false;
        $id = $_GET['threadid'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $messa = $_POST['message'];
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$messa', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="comwnt">Your Comment have been added </div>';
            }
                header("Location: /codesolution/thread.php?threadid=$id");
        }
    ?>
</head>
<body>
<?php include ("dbconnect.php"); ?>
<?php include ("header.php"); ?>

<?php
$id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id=$id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
$title = $row['thread_title'];
$desc = $row['thread_desc'];
$thread_user_id = $row['thread_user_id'];


$sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$posted_by = $row2['user_email'];
}

?>


<section class="threadlist_whole">
        <div class="threadlist_container">
            <h5>Thread Title: <?php echo $title; ?></h5>
            <p>Thread Description: <?php echo $desc; ?></p>
            <h4>Posted By: <?php echo $posted_by; ?> </h4>
            <hr>
        </div>

        <div class="threadlist_policy">
            <p>This is a peer to peer forum . No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post
                copyright-infringing material. ... Do not post “offensive” posts, links or images. ... Do not cross post
                questions. ... Remain respectful of other members at all times.</p>
                
        </div>
        <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<div class="threadlist_form">
                <h5>Post a Comment</h5>
                <div class="form_submission">
                    <form action="'. $_SERVER['REQUEST_URI'] . '" method="post">
                    
                    <div class="title_body">
                        <label for="message">Type Your Comment</label>
                        <textarea name="message" id="comments" cols="30" rows="5"></textarea>
                        <input type="hidden" name="sno" id="sno" value="' . $_SESSION['sno'] . '">
                    </div>
                    <button type="submit" class="button_threadlist">Submit</button>
                </div>
                    </form>
        </div>';
    }
    else{
        echo '<div class="threadlist_form">
        <h5>Post a Comment</h5>
        <p class="leads">You are not logged in. Please login to be able to start a discussion.</p>
    </div>';
    }
    ?>

        <div class="threadlist_form">
                    <h5>Discussions</h5>
                    <?php
                    $id = $_GET['threadid'];
                    $sql = "SELECT * FROM `comment` WHERE thread_id=$id";
                    $result = mysqli_query($conn, $sql);
                    $noResult = true;
                    while($row = mysqli_fetch_assoc($result)){
                        $noResult = false;
                        $content = $row['comment_content'];
                        $timePeriod = $row['comment_time'];
                        $thread_user_id = $row['comment_by'];

                        $sql2 = "SELECT user_email FROM `users` WHERE sno=$thread_user_id";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);

                        echo '<div class="threadlist_useranser">
                        <div class="user_icon"><i class="fas fa-user"></i></div>
                        <div class="threadlist_ques">
                            <h4>' . @$row2['user_email'] . ' at ' . $timePeriod . '</h4>
                            <p>' . $content . '</p>
                        </div>
                    </div>';

                    }
                    if($noResult){
                        echo '<div class="noshow">Be the first person to add your thread </div>';
                    }
                    
                    ?>
                       
        </div>

</section>
<?php include"footer.php"; ?>
</body>
</html>