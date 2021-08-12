
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>CodeSolution</title>
</head>

<body>
    <div class="signup_container">
        <div class="signup_body">
            <div class="login_head">
                <p>Signup CodeSolution</p>
                <a class="close addjoin" onclick="removeddd()"><i class="fas fa-times"></i></a>
            </div>
            <hr class="login_line">
            <div class="login_form">
                <form id="sign_user" method="post">
                    <div class="login_username">
                        <label for="useremail">Email address</label>
                        <input type="email" name="useremail" id="useremail" class="sing_data">
                        <!-- <span>We'll never share your email with anyone else.</span> -->
                        <span id="email_error" style="color:red;"></span>
                    </div>
                    <div class="login_password">
                        <label for="user_password">Password</label>
                        <input type="text" name="user_password" id="user_password" class="sing_data">
                        <span id="pass_error" style="color:red;"></span>
                    </div>
                    <div class="clogin_password">
                        <label for="cuser_password">Confirm Password</label>
                        <input type="text" name="cuser_password" id="cuser_password" class="sing_data">
                        <span id="cpass_error" style="color:red;"></span>
                    </div>
                    <button type="button" class="login_submit" onclick="sign_data(); return false;">Submit</button>
                </form>

                
            </div>
            <hr>
            <button class="user_close" onclick="clos()">Close</button>
        </div>
    </div>
</div>
    <script src="js/signup.js"></script>
    <script src="js/login.js"></script>
    <script src="js/index.js"></script>
</body>

</html>