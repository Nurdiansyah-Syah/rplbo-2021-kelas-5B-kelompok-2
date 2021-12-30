<?php
global $application, $content;

if (!$application) {
	exit();
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
    <nav class="navbar navbar-default navbar-fixed-top pmd-navbar pmd-z-depth-1" style="z-index: 1030;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img class="navbar-img" src="images/logo.png" width="40">
                </a>
                <span class="navbar-title" style="line-height: 55px; font-size: 30px;">
                    <?php echo strtoupper($config["name"]); ?>
                </span>
            </div>
            <div class="collapse navbar-collapse pmd-navbar-sidebar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="pmd-ripple-effect" href="admin.php?component=Home&action=logout"><b>Logout</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--End Nav bar -->
    <!-- Header Ends -->

    <!-- Sidebar Starts -->
    <div class="pmd-sidebar-overlay"></div>

    <!-- Left sidebar -->
    <aside
        class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons"
        role="navigation">
        <ul class="nav pmd-sidebar-nav">
            <li>
                <a class="pmd-ripple-effect" href="index.html">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">BERANDA</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Suratmasuk">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">SURAT MASUK</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Suratkeluar">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">SURAT KELUAR</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Pengajuansurat">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">PENGAJUAN SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Pengajuansurat&action=add">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
						M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">PELACAKAN SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="admin.php?component=Pengajuanlegalisir&action=add">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
				M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">LEGALISIR SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="index.html">
                    <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px"
                            viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                            xml:space="preserve">
                            <g>
                                <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
				M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z" />
                            </g>
                        </svg></i>
                    <span class="media-body">RESEPSIONIS</span>
                </a>
            </li>
        </ul>


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