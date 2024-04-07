<?php
session_start();
require 'config.php';

// this returns back the form details if there was an error
$fullname = $_SESSION['registration-data']['fullname'] ?? null;
$email = $_SESSION['registration-data']['email'] ?? null;
$password = $_SESSION['registration-data']['password'] ?? null;
$rpassword = $_SESSION['registration-data']['rpassword'] ?? null;

// delete the registration session
unset($_SESSION['registration-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Avatar Restaurant</title>
    <link rel="stylesheet" href="regstyle.css">
</head>
<body>
    <header>
        <img src="Logo.png" width="80px" height="80px">
        <h2 class="logo">The Avatar Restaurant</h2>
        <nav class="navigation">
            <a href="index.html"><b>Home</b></a>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <!-- error message -->
<?php
        if (isset($_SESSION['register_success'])) : ?>   
    <p style="color: green; text-align: center"><?= $_SESSION['register_success']; unset($_SESSION['register_success']);?></p><br>
    <?php elseif (isset($_SESSION['login_error'])) : ?>   
        <p style="color: red; text-align: center;"><?= $_SESSION['login_error']; unset($_SESSION['login_error']);?></p><br>
        <?php endif ?>
        
        <!--/ error message -->
            <form action="login_process.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" value="<?= $email ?>"  id="email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" value="<?= $password ?>"  id="password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <a href="forgot-password.php">Forgot Password</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <!-- error message -->
        <?php
            if (isset($_SESSION['register_error'])) : ?>   
        <p style="color: red; text-align: center;"><?= $_SESSION['register_error']; unset($_SESSION['register_error']);?></p><br>
       <?php endif ?>
       <!-- /error message -->
             
                <div class="input-box">
                <form action="register_process.php" method="post" autocomplete="off" >
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" value="<?= $email ?>"  id="email">
                    <label>Email</label>
                    <span id="email-error" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="fullname" value="<?= $fullname ?>"  id="email">
                    <label>Full name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" value="<?= $password ?>"  id="password">
                    <label>Password</label>
                    <span id="password-error" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="rpassword" value="<?= $rpassword ?>" id="rpassword">
                    <label>Confirm Password</label>
                    <span id="rpassword-error" class="error"></span>
                </div>
                <div class="remember-forgot">
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </div>
                <button type="submit" name="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="regscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>




