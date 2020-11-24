<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Dynamic Single Page Login + Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'>
    <style>
        img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                /* remove extra space below image */
            }
    </style>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- partial:index.partial.html -->
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
                    <form id="form-signup" method="POST" onsubmit="myvalid()" action="server.php">
                        <div class="form-element form-stack">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="username-signup" class="form-label">Username</label>
                            <input id="username-signup" type="text" name="username" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-signup" class="form-label">Password</label>
                            <input id="password-signup" type="password" name="password" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-signup" class="form-label">Confirm Password</label>
                            <input id="cpassword-signup" type="password" name="cpassword" oninput="myFunctionv()" required>
                            <div id="passwd"></div>
                        </div>
                        <div class="form-element form-checkbox">
                            <input type="checkbox" onclick="myFunctionsui()"><label for="show password">Show Password</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="gender" class="form-label">gender</label>
                        </div>
                        <div class="form-element form-radiobutton">
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Other</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="role" class="form-label">role</label>
                        </div>
                        <div class="form-element form-radiobutton">
                            <input type="radio" id="seller" name="role" value="seller">
                            <label for="seller">Seller</label>
                            <input type="radio" id="buyer" name="role" value="buyer">
                            <label for="buyer">Buyer</label>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Phone Number</label>
                            <input id="phno" type="text" name="phno">
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">address</label>
                            <input id="address" type="text" name="address">
                        </div>
                        <div class="form-element form-submit">
                            <button id="signUp" class="signup" form="form-signup" name="signup">Sign up</button>
                            <button id="goLeft" class="signup off">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="content">
                    <h2>Login</h2>
                    <form id="form-login" method="post" action="server.php">
                        <div class="form-element form-stack">
                            <label for="email-login" class="form-label">Email</label>
                            <input id="email-login" type="email" name="username" required>
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Password</label>
                            <input id="password-login" type="password" name="password" required>
                        </div>
                        <div class="form-element form-checkbox">
                            <input type="checkbox" onclick="myFunctionli()"><label for="confirm-terms">Show Password</label>
                        </div>
                        <div class="form-element form-submit">
                            <button id="logIn" class="login" form="form-login" type="submit" name="login">Log In</button>
                            <button id="goRight" class="login off" name="signup">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 

Remixed from "Sliding Login Form" Codepen by
C-Rodg (github.com/C-Rodg)
https://codepen.io/crodg/pen/yNKxej

Remixed from "Paper.js - Animated Shapes Header" Codepen by
Connor Hubeny (@cooper_hu)
https://codepen.io/cooper_hu/pen/ybxoev

Custom Checkbox based on the blog post by
Mik Ted (@inserthtml):
https://www.inserthtml.com/2012/06/custom-form-radio-checkbox/

HTML5 Form Validation based on the blog post by
Thoriq Firdaus (@tfirdaus):
https://webdesign.tutsplus.com/tutorials/
html5-form-validation-with-the-pattern-attribute--cms-25145

-->
    <!-- partial -->
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
            var y = document.getElementById("password-signup");
            var x = document.getElementById("cpassword-signup");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        function myFunctionv() {
            var x = document.getElementById("cpassword-signup").value;
            var y = document.getElementById("password-signup").value;

            if (x == y) {
                document.getElementById("passwd").innerHTML = "";
            }
            if (x != y) {
                document.getElementById("passwd").innerHTML = "Password not match";
            }
        }

        function myvalid() {
            var x = document.getElementById("cpassword-signup").value;
            var y = document.getElementById("password-signup").value;
            if (x != y) {
                alert("different password");
                document.getElementById("cpassword-signup").select();
                return false;
            }
        }
    </script>
</body>

</html>