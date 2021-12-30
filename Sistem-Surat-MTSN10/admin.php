<?php
//Includes file
require_once __DIR__ . '/includes/configuration.php';
require_once __DIR__ . '/includes/class.php';
require_once __DIR__ . '/includes/function.php';

//Session
session_start();

//Route
$component = isset($_REQUEST['component']) ? $_REQUEST['component'] : 'Home';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

require_once(__DIR__ . '/components/' . strtolower($component) . '.model.php');
require_once(__DIR__ . '/components/' . strtolower($component) . '.view.php');
require_once(__DIR__ . '/components/' . strtolower($component) . '.controller.php');

ob_start();

$controllerName = $component . 'Controller';
$controller = new $controllerName();
$controller->{$action}();

$content = ob_get_contents();
ob_clean();


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
    <link rel="stylesheet" href="js/datetimepicker/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="js/datetimepicker/pmd-datetimepicker.css">
    <link rel="stylesheet" href="js/select2/select2.min.css">
    <link rel="stylesheet" href="js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="js/select2/pmd-select2.css">
    <link rel="stylesheet" href="css/propeller-admin.css">
</head>

<body>
    <!-- Header Starts -->
    <!--Start Nav bar -->
    <nav class="navbar navbar-default navbar-fixed-top pmd-navbar pmd-z-depth">
        <div class="container-fluid">
            <div class="pmd-navbar-right-icon pull-right navigation">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse pmd-navbar-sidebar">
                        <ul class="nav nav-default navbar-nav navbar-right">
                            <li><a class="pmd-ripple-effect" href="index.php"><b>Logout</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="javascript:void(0);" class="btn btn-sm btn-default pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons">menu</i></a>
                <a class="navbar-brand" href="#">
                    <img class="navbar-img" src="images/logo.png" width="40">
                </a>
                <span class="navbar-title" style="line-height: 60px; font-size: 30px;">
                    <?php echo strtoupper($config["name"]); ?>
                </span>
            </div>
        </div>
    </nav>
    <!--End Nav bar -->
    <!-- Header Ends -->

    <!-- Sidebar Starts -->
    <div class="pmd-sidebar-overlay"></div>

    <!-- Left sidebar -->
    <aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
        <ul class="nav pmd-sidebar-nav">
            <li>
                <a class="pmd-ripple-effect" href="admin.php">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18" xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">BERANDA</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="suratmasuk.php">
                    <i class="media-left media-middle">
                        <svg version="1.1" x="0px" y="0px" width="18px" height="12.479px" viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479" xml:space="preserve">
                            <g transform="translate(641.29613,1096.2351)">
                                <path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484
								l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188
								c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z" />
                            </g>
                        </svg></i>
                    <span class="media-body">SURAT MASUK</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Suratkeluar">
                    <i class="material-icons media-left pmd-sm">screen_share</i>
                    <span class="media-body">SURAT KELUAR</span>
                </a>
            </li>

            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Pengajuansurat&action=add">
                    <i class="material-icons media-left pmd-sm">youtube_searched_for</i>
                    <span class="media-body">PELACAKAN SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Pengajuanlegalisir&action=add">
                    <i class="media-left media-middle">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="18px" height="18px" viewBox="288.64 337.535 18 18" enable-background="new 288.64 337.535 18 18" xml:space="preserve">
                            <path fill="#C9C8C8" d="M295.39,337.535v2.25h9v13.5h-9v2.25h11.25v-18H295.39z M297.64,342.035v3.375h-9v2.25h9v3.375l3.375-3.375
					l1.125-1.125l-1.125-1.125L297.64,342.035z" />
                        </svg></i>
                    </svg></i>
                    <span class="media-body">LEGALISIR SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php">
                    <i class="material-icons media-left pmd-sm">settings</i>
                    <span class="media-body">PENGATURAN PENGGUNA</span>
                </a>
            </li>
        </ul>
    </aside>


    <?php echo $content; ?>
    </div>
    <script src="js/jquery-1.12.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/propeller.min.js"></script>
    <script src="js/datetimepicker/moment-with-locales.js"></script>
    <script src="js/datetimepicker/locale/id.js"></script>
    <script src="js/datetimepicker/bootstrap-datetimepicker.js"></script>
    <script src="js/select2/select2.full.js"></script>
    <script src="js/select2/pmd-select2.js"></script>
    <script src="js/propeller-admin.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>