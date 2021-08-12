<!-- login page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>CodeSolution</title>
</head>

<body>
    <div class="login_container">
        <div class="login_body">
            <div class="login_head">
                <p>Login CodeSolution</p>
                <a class="close" onclick="remove()"><i class="fas fa-times"></i></a>
            </div>
            <hr class="login_line">
            <div class="login_form">
                <form action="/codesolution/handlelogin.php" method="post" id="lgner">
                    <div class="login_username">
                        <label for="useremail">Email address</label>
                        <input type="email" name="useremail" id="useremail" class="logn_val">
                        <span>We'll never share your email with anyone else.</span>
                        <span id="email_err" style="color:red;"></span>
                    </div>
                    <div class="login_password">
                        <label for="">Password</label>
                        <input type="text" name="user_password" id="user_password" class="logn_val">
                        <span id="passw_err" style="color:red;"></span>
                    </div>
                    <button type="button" class="login_submit logon" onclick="safe_sign(); return false;">Submit</button>
                </form>

               
            </div>
            <hr>
            <button class="user_close"  onclick="closes()">Close</button>
        </div>
    </div>
   
</body>
<script src="js/login.js"></script>
<script src="js/lofin.js"></script>
</html>