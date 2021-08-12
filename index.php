<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <title>CodeSolution</title>
</head>

<body>
    <!-- ====================header section include======================================== -->
    <?php include "header.php"; ?>
    <!-- ====================Database connection include here======================================== -->
    <?php include "dbconnect.php"; ?>

    
    
    <!-- ====================slider starts from here======================================== -->
    <div class="slider_conatiner">
        <div class="slider_image">
            <img src="img/code1.jpg" alt="imagefirst" class="slider fade">
            <img src="img/code2.jpg" alt="secondfirst" class="slider fade">
            <img src="img/code3.jpg" alt="thirdfirst" class="slider fade">
        </div>

        <div class="right_arrow" onclick="plus(1)"><i class="fas fa-arrow-right"></i></div>
        <div class="left_arrow" onclick="plus(-1)"><i class="fas fa-arrow-left"></i></div>
    </div>

    <!-- ==============================category conatiner starts here================================= -->
    <div class="category_container">
        <div class="category_head">
            <h2>Browse Category</h2>
        </div>
        
        <div class="category_content">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_discription'];
                echo '<div class="category_source">
               
                <h5><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                <p>' . substr($desc, 0, 35) . '</p>
                <a href="threadlist.php?catid=' . $id . '" class="thread">View Threads</a>
            </div>';
            }
            
            ?>
        </div>
    </div>







    <?php include "footer.php"; ?>
    <script src="js/index.js"></script>
</body>

</html>