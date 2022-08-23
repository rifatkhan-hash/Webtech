<?php
    session_start();
    if(isset($_SESSION['username'])) {
        
        header("Location: /labtask6/view/dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
        <style>
            fieldset {
                width: 500px;
            }
        </style>
    </head>
    <body>
        <fieldset style="width: 98%;">
            <?php include('../view/header.php'); ?>
            <div style="float: right;">
                <a href="/labtask6/view/login.php">Login</a> | <a href="/labtask6/Home.php">Home</a>
            </div>
        </fieldset>

        <form action="/labtask6/controller/loginAction.php" target="_self" method="POST" onsubmit="return validlogin(this)">  
            <fieldset style="width: 500px; margin-left: auto; margin-right: auto;">
                <legend><h3>SignIn</h3></legend>
                <?php
                    if (isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <span id="msg"></span>
               <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                            <span id="userErr" style="color: red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
                            <span id="passErr" style="color: red;"></span>
                        </td>
                    </tr>
                </table> 
                <br>
                <input type="checkbox" name="remember" id="rem"><label for="rem">Remember me</label>
                <br><br>
                <input type="submit" name="login" value="Login">
                <a href="/labtask6/view/registration.php">Need to registration?</a>
            </fieldset>
        </form>

        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../view/footer.php'; ?>
        </fieldset>
        <script>
            function validlogin(login) {
            let userErr = document.getElementById("userErr");
            let passErr = document.getElementById("passErr");

            userErr.innerHTML = "";
            passErr.innerHTML = "";

            let user = login.user.value;
            let pass = login.pass.value;

            let isvalid = true;
            let isEmpty = false;
            if(user === "") {
                userErr.innerHTML = "❗Username should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            if(pass === "") {
                passErr.innerHTML = "❗Password should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            return isvalid;
        }
        </script>
    </body>
</html>