<?php
//Includes file
require_once __DIR__ . '/includes/configuration.php';
require_once __DIR__ . '/includes/class.php';
require_once __DIR__ . '/includes/function.php';

//Session
session_start();

//Route
$component = isset($_REQUEST['component']) ? $_REQUEST['component'] : 'Suratmasuk';
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
                            <li><a class="pmd-ripple-effect" href="loginpage.php"><b>Login</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="javascript:void(0);"
                    class="btn btn-sm btn-default pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i
                        class="material-icons">menu</i></a>
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
    <aside
        class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons"
        role="navigation">
        <ul class="nav pmd-sidebar-nav">
            <li>
                <a class="pmd-ripple-effect" href="admin.php">
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
                <a class="pmd-ripple-effect" href="suratmasuk.php">
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
                <a class="pmd-ripple-effect" href="admin.php">
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
    </aside>

    <!--content area start-->
    <div id="content" class="pmd-content content-area">
        <div class="row">
            <div class="pmd-card-title">
                <div class="container-fluid app-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="pmd-card app-index-card">
                                <div class="pmd-card-title">
                                    <div class="pull-left">
                                        <h2 style="margin-top:7px;">Surat Masuk</h2>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-success" href="admin.php?component=Suratmasuk">Entri</a>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                                <div class="pmd-card-body" style="padding-top:30px;">
                                    <div class="pmd-table-card">
                                        <table cellspacing="0" cellpadding="0"
                                            class="table table-sm pmd-table table-striped table-hover table-bordered table-selected table-header-sticked"
                                            id="table-propeller">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Id</th>
                                                    <th>NISN</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Jenis Surat</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (count($result) > 0) {
                                                    foreach ($result as $data) {
                                                ?>
                                                <tr>
                                                    <td data-title="No"><?php echo $no; ?></td>
                                                    <td data-title="">
                                                        <a
                                                            href="admin.php?component=Suratmasuk&action=edit&id=<?php echo $data->id; ?>"><i
                                                                class="material-icons md-dark pmd-xs">mode_edit</i></a>
                                                        <a
                                                            href="javascript:hapus(<?php echo $data->id; ?>, '<?php echo addslashes($data->username); ?>')"><i
                                                                class="material-icons md-dark pmd-xs">delete_forever</i></a>
                                                    </td>
                                                    <td data-title="NISN"><?php echo $data->nisn; ?></td>
                                                    <td data-title="Nama"><?php echo $data->nama; ?></td>
                                                    <td data-title="Email"><?php echo $data->email; ?></td>
                                                    <td data-title="Jenis_Surat"><?php echo $data->jenis_surat; ?></td>
                                                </tr>
                                                <?php
                                                        $no++;
                                                    }
                                                } else {
                                                    ?>
                                                <tr>
                                                    <td colspan="5">Tidak ada</td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end content area-->


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