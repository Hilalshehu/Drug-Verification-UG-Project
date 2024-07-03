<?php
session_start();
require_once 'config/config.php';
$token = bin2hex(openssl_random_pseudo_bytes(16));

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
    header('Location: index.php');
    exit;
}

// If user has previously selected "remember me" option: 
if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token'])) {
    // Get user credentials from cookies.
    $series_id = filter_var($_COOKIE['series_id']);
    $remember_token = filter_var($_COOKIE['remember_token']);
    $db = getDbInstance();
    // Get user By series ID: 
    $db->where('series_id', $series_id);
    $row = $db->getOne('admin_accounts');

    if ($db->count >= 1) {
        // User found. Verify remember token
        if (password_verify($remember_token, $row['remember_token'])) {
            // Verify if expiry time is modified. 
            $expires = strtotime($row['expires']);

            if (strtotime(date('Y-m-d H:i:s')) > $expires) {
                // Remember Cookie has expired. 
                clearAuthCookie();
                header('Location: login.php');
                exit;
            }

            $_SESSION['user_logged_in'] = TRUE;
            $_SESSION['admin_type'] = $row['admin_type'];
            $_SESSION['user_name'] = $row['user_name'];
            header('Location: index.php');
            exit;
        } else {
            clearAuthCookie();
            header('Location: login.php');
            exit;
        }
    } else {
        clearAuthCookie();
        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NAFDAC Online Drug Verification System - Login</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include necessary meta tags, CSS files, and Google Fonts from home.html -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #e0eafc, #cfdef3);
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
            background: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 60px); /* Adjust based on header height */
            margin-top: 60px; /* Adjust based on header height */
        }
        .screen {
            background: #ffffff;
            position: relative;
            width: 360px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .screen__content {
            position: relative;
        }
        .login {
            width: 100%;
        }
        .login__field {
            margin-bottom: 20px;
            position: relative;
        }
        .login__icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .login__input {
            border: 1px solid #ced4da;
            border-radius: 30px;
            padding: 10px 15px;
            padding-left: 50px;
            font-size: 16px;
            width: calc(100% - 35px);
            transition: border-color 0.3s ease;
        }
        .login__input:focus {
            border-color: #007bff;
            outline: none;
        }
        .login__submit {
            background: #007bff;
            color: #ffffff;
            border: none;
            padding: 15px 25px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .login__submit:hover {
            background-color: #0056b3;
        }
        .social-login {
            margin-top: 20px;
            text-align: center;
        }
        .social-login h3 {
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .social-login__icon {
            font-size: 24px;
            color: #007bff;
            transition: color 0.3s ease;
        }
        .social-login__icon:hover {
            color: #0056b3;
        }
        .screen__background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .screen__background__shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 123, 255, 0.1);
            transition: transform 2s ease-in-out;
        }
        .screen__background__shape1 {
            width: 200px;
            height: 200px;
            top: -50px;
            right: -100px;
        }
        .screen__background__shape2 {
            width: 250px;
            height: 250px;
            top: 50%;
            left: -100px;
        }
        .screen__background__shape3 {
            width: 300px;
            height: 300px;
            top: 70%;
            right: -150px;
        }
        .screen__background__shape4 {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 70%;
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <button class="back-button" onclick="window.history.back();">
        <i class="fa fa-arrow-left"></i> Back
    </button>

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="POST" action="authenticate.php">
                    <div class="login__field">
                        <i class="login__icon fa fa-user"></i>
                        <input type="email" name="username" class="login__input" placeholder="Username" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fa fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password" id="myInput" required>
                    </div>

                    <?php if (isset($_SESSION['login_failure'])): ?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php
                        echo $_SESSION['login_failure'];
                        unset($_SESSION['login_failure']);
                        ?>
                    </div>
                    <?php endif; ?>
                    
                    <button class="login__submit" type="submit">
                        Log In Now
                    </button>
                </form>
                <div class="social-login">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fa fa-instagram"></a>
                        <a href="#" class="social-login__icon fa fa-facebook"></a>
                        <a href="#" class="social-login__icon fa fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape1"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape4"></span>
            </div>
        </div>
    </div>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
