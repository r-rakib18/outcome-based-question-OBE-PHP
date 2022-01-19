<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_id'] != null) {
        header('Location: dashboard.php');
    }
}
if (isset($_POST['btn'])) {
    require_once 'class/login.php';
    $login = new login();
    $login->login_check($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V8</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="asset/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="aasset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="asset/css/util.css">
        <link rel="stylesheet" type="text/css" href="asset/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="post">
                        <span class="login100-form-title">
                            User Login and Registration
                        </span>
                        <div class="text-right p-t-13 p-b-23">
                            <div class="container-login100-form-btn">
                                <a href="user_login.php" class="login100-form-btn" role="button">Login</a>
                            </div>
                        </div>
                        <div class="text-right p-t-13 p-b-23">
                            <div class="container-login100-form-btn">
                                <a href="user_registration.php" class="login100-form-btn" role="button">Registration</a>
                            </div>
                        </div>
                        <div class="flex-col-c p-t-170 p-b-40">
                            <span class="txt1 p-b-9">
                                Don’t have an account then No access?
                                
                            </span>

                            <a href="#" class="txt3">

                            </a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>


        <!--===============================================================================================-->
        <script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="asset/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="asset/vendor/bootstrap/js/popper.js"></script>
        <script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="asset/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="asset/vendor/daterangepicker/moment.min.js"></script>
        <script src="asset/vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="asset/vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="asset/js/main.js"></script>

    </body>
</html>