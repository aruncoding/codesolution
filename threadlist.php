<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/threadlist.css">
    <link rel="stylesheet" href="css/all.css">
    <title>CodeSolution</title>
    <?php include ("dbconnect.php"); ?>
   
        <?php
        $showAlert = false;
        $id = $_GET['catid'];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $th_title = $_POST['title'];
            $th_desc = $_POST['message'];
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            
            
            header("Location: /codesolution/threadlist.php?catid=$id");
        }
        ?>
</head>

<body>
     <!-- ====================header section include======================================== -->
    <?php include ("header.php"); ?>
    <?php $showAlert = true;
            if($showAlert){
                echo '<div class="sucess">Your Threads have been added </div>';
            }
            ?>
    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_discription'];
        }
        ?>
    <section class="threadlist_whole">
        <div class="threadlist_container">
            <h5>Welcome to <?php echo $catname; ?> Forums</h5>
            <p><?php echo $catdesc; ?>
            </p>
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
                <h5>Start a Discussions</h5>
                <div class="form_submission">
                    <form action="'. $_SERVER['REQUEST_URI'] . '" method="post">
                    <div class="title_head">
                        <label for="title">Problem Title sss</label>
                        <input type="text" name="title" id="title" class="form_data">
                    </div>
                    <input type="hidden" name="sno" id="sno" class="form_data" value="'. $_SESSION['sno']. '">
                    <div class="title_body">
                        <label for="message">Ellobrate your concern</label>
                        <textarea name="message" class="form_data" id="comment" cols="30" rows="3"></textarea>
                    </div>
                    <button type="submit" class="button_threadlist">Submit</button>
                </div>
                    </form>
            </div>';
        }
        else{
        echo    '<div class="threadlist_form">
                    <h5>Start a Discussions</h5>
                    <p class="leads">You are not logged in. Please login to be able to start a discussion.</p>
                </div>';
        }
        ?>

        <div class="threadlist_answer">
            <h5>Browser Questions</h5>
            <hr>
        </div>

        <div class="threadlist_query">
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $id = $row['thread_id'];
                $thread_time = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="threadlist_useranser">
                        <div class="user_icon"><i class="fas fa-user"></i></div>
                        <div class="threadlist_ques">
                            <h5>'. $row2['user_email'] . ' at '. $thread_time. '</h5>
                            <a href="thread.php?threadid=' . $id . '">'. $title . '</a>
                            <p>'. $desc . '</p>
                        </div>
                    </div> '; 
        
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