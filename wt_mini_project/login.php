<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'>
    <style>
        img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
    </style>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="back">
        <div class="backRight">
            <img src="./img/auction.jpeg">
        </div>
        <div class="backLeft">
            <img src="./img/auction.jpeg">
        </div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="left">
                <div class="content">
                    <h2>Sign Up</h2>
                    <form id="form_signup" method="post" onsubmit="myvalid()">
                        <div class="form-element form-stack">
                            <label for="email" class="form-label">Email</label>
                            <input id="email_signup" type="email" name="email_signup" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="username_signup" class="form-label">Username</label>
                            <input id="username_signup" type="text" name="username_signup" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password_signup" class="form-label">Password</label>
                            <input id="password_signup" type="password" name="password_signup" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password_signup" class="form-label">Confirm Password</label>
                            <input id="cpassword_signup" type="password" name="cpassword" oninput="myFunctionv()" required>
                            <div id="passwd" style="color:red;"></div>
                        </div>
                        <div class="form-element form-checkbox">
                            <input type="checkbox" onclick="myFunctionsui()"><label for="show password">Show Password</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="gender" class="form-label">gender</label>
                        </div>
                        <div class="form-element form-radiobutton">
                            <input type="radio" id="male" name="gender_signup" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender_signup" value="female">
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender_signup" value="other">
                            <label for="other">Other</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="role" class="form-label">role</label>
                        </div>
                        <div class="form-element form-radiobutton">
                            <input type="radio" id="seller" name="role_signup" value="seller">
                            <label for="seller">Seller</label>
                            <input type="radio" id="buyer" name="role_signup" value="buyer">
                            <label for="buyer">Buyer</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Phone Number</label>
                            <input id="phno_signup" type="text" name="phno_signup">
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">address</label>
                            <input id="address_signup" type="text" name="address_signup">
                        </div>
                        <div class="form-element form-submit">
                            <button id="signUp" class="signup" formaction="server.php" type="submit" name="signup" >Sign up</button>
                            <button id="goLeft" class="signup off" formnovalidate>Log In</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form id="form-login" method="post">
                        <div class="form-element form-stack">
                            <label for="email-login" class="form-label">Email</label>
                            <input id="email-login" type="email" name="login_email" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Password</label>
                            <input id="password-login" type="password" name="login_password" required>
                        </div>
                        <div class="form-element form-checkbox">
                            <input type="checkbox" onclick="myFunctionli()"><label for="confirm-terms">Show Password</label>
                        </div>
                        <div style="color:red;font-size: 12px;">
                            <?php 
                            if(isset($_GET["error"])){
                                echo "*".$_GET["error"];
                            }
                            ?>
                        </div>
                        <div class="form-element form-submit">
                            <button id="logIn" class="login" formaction="server.php" type="submit" name="login">Log In</button>
                            <button id="goRight" class="login off" name="signup" >Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js'></script>
    <script src="./js/script.js"></script>
    <script>
        function myFunctionli() {
            var x = document.getElementById("password-login");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunctionsui() {
            var y = document.getElementById("password_signup");
            var x = document.getElementById("cpassword_signup");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        function myFunctionv() {
            var x = document.getElementById("cpassword_signup").value;
            var y = document.getElementById("password_signup").value;

            if (x == y) {
                document.getElementById("passwd").innerHTML = "";
            }
            if (x != y) {
                document.getElementById("passwd").innerHTML = "*Password not match";
            }
        }

        function myvalid() {
            var x = document.getElementById("cpassword_signup").value;
            var y = document.getElementById("password_signup").value;
            if (x != y) {
                alert("different password");
                document.getElementById("cpassword_signup").select();
                return false;
            }
        }
    </script>
</body>

</html>