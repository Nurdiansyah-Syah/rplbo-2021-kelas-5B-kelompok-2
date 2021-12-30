<?php
//Includes file
require_once __DIR__ . '/includes/configuration.php';
require_once __DIR__ . '/includes/function.php';

//Session
session_name("materiweb");
session_start();

//jika tidak masuk maka akan membuka admin.php
if (isset($_SESSION['error'])) {
    header("Location.loginpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $config["name"]; ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="fonts/material-icons/material-icons.css">
    <link rel="stylesheet" href="fonts/montserrat/montserrat.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/propeller.min.css">
    <link rel="stylesheet" href="css/propeller-admin.css">
    <link rel="stylesheet" href="css/propeller-index.css">
</head>

<body class="body-custom">
    <div class="logincard">
        <div class="pmd-card card-default pmd-z-depth">
            <div class="login-card">
                <form action="cek_login.php" method="post">
                    <input type="hidden" name="component" value="Home">
                    <input type="hidden" name="action" value="login">
                    <div class="pmd-card-title card-header-border text-center">
                        <div class="loginlogo">
                            <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
                        </div>
                        <h1><a href="index.php"><?php echo strtoupper($config["name"]); ?></a></h1>
                    </div>
                    <div class="pmd-card-body">

                        <?php
                        if (isset($_SESSION['error'])) {
                            $error = $_SESSION['error'];
                            echo "<div class= 'alert-danger text-center'>$error</div>";
                        }

                        ?>

                        <div class="form-group pmd-textfield">
                            <label for="username" class="control-label pmd-input-group-label">Username</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i
                                        class="material-icons md-dark pmd-sm">perm_identity</i></div>
                                <input class="form-control" id="username" name="username" required autofocus>
                            </div>
                        </div>
                        <div class="form-group pmd-textfield">
                            <label for="password" class="control-label pmd-input-group-label">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i>
                                </div>
                                <input class="form-control" type="password" id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                        <input type="submit" class="btn pmd-ripple-effect btn-primary btn-block" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.12.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/propeller.min.js"></script>
    <script src="js/propeller-index.js"></script>
</body>

</html>

<?php
unset($_SESSION['error']);
?>