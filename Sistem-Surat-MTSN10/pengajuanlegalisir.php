<?php
//Includes file
require_once "function.php";
require_once "class.php";
require_once __DIR__ . '/includes/configuration.php';
require_once __DIR__ . '/includes/class.php';
require_once __DIR__ . '/includes/function.php';

//Session
session_name("materiweb");
session_start();

//Route
$component = isset($_REQUEST['component']) ? $_REQUEST['component'] : 'Pengajuanlegalisir';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

//Includes Model, View, and Controller
if (!file_exists(__DIR__ . '/components/' . strtolower($component) . '.controller.php')) {
    echo "File tidak ditemukan";
    exit();
}

require_once(__DIR__ . '/components/' . strtolower($component) . '.model.php');
require_once(__DIR__ . '/components/' . strtolower($component) . '.view.php');
require_once(__DIR__ . '/components/' . strtolower($component) . '.controller.php');


if (isset($_POST["submit"])) {
    if (($_POST) > 0) {
    } else {
    }
}
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
                <a class="pmd-ripple-effect" href="index.php">
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
                <a class="pmd-ripple-effect" href="pengajuansurat.php">
                    <i class="media-left media-middle">
                        <svg version="1.1" x="0px" y="0px" width="18px" height="12.479px"
                            viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479"
                            xml:space="preserve">
                            <g transform="translate(641.29613,1096.2351)">
                                <path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484
								l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188
								c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z" />
                            </g>
                        </svg></i>
                    <span class="media-body">PENGAJUAN SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="pengajuanlegalisir.php">
                    <i class="media-left media-middle">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="18px" height="18px"
                            viewBox="288.64 337.535 18 18" enable-background="new 288.64 337.535 18 18"
                            xml:space="preserve">
                            <path fill="#C9C8C8" d="M295.39,337.535v2.25h9v13.5h-9v2.25h11.25v-18H295.39z M297.64,342.035v3.375h-9v2.25h9v3.375l3.375-3.375
					l1.125-1.125l-1.125-1.125L297.64,342.035z" />
                        </svg></i>
                    </svg></i>
                    <span class="media-body">LEGALISIR SURAT</span>
                </a>
            </li>
            <li>
                <a class="pmd-ripple-effect" href="pelacakan.php">
                    <i class="material-icons media-left pmd-sm">youtube_searched_for</i>
                    <span class="media-body">PELACAKAN SURAT</span>
                </a>
            </li>

        </ul>
    </aside>

    <!--content area start-->
    <div id="content" class="pmd-content content-area">
        <div class="row">
            <div class="col-md-12">
                <div class="pmd-card-title">
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-md-6">
                                <form style="margin-left: 40px"
                                    action="dashboard.php?component=Pengajuanlegalisir&action=save" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="id">
                                    <div class="pmd-card app-index-card">
                                        <div class="pmd-card-title">
                                            <div class="pull-left">
                                                <h2 style="margin-top:7px;">Pengajuan Legalisir</h2>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="pmd-card-body">
                                            <div class="group-fields clearfix row">
                                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <div class="form-group form-group-sm">
                                                        <label for="nisn" class="control-label">
                                                            NISN
                                                        </label>
                                                        <input class="form-control" type="text"
                                                            onkeypress="return hanyaAngka(event)" id="nisn" name="nisn"
                                                            maxlength="11" required autofocus>
                                                        <script>
                                                        function hanyaAngka(evt) {
                                                            var charCode = (evt.which) ? evt.which : event.keyCode
                                                            if (charCode > 31 && (charCode < 48 || charCode > 57))

                                                                return false;
                                                            return true;
                                                        }
                                                        </script>
                                                        <span class="pmd-textfield-focused"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="group-fields clearfix row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group form-group-sm">
                                                        <label for="nama" class="control-label">
                                                            NAMA
                                                        </label>
                                                        <input class="form-control" id="nama" name="nama" maxlength="50"
                                                            required>
                                                        <span class="pmd-textfield-focused"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="group-fields clearfix row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group form-group-sm">
                                                        <label for="email" class="control-label">
                                                            EMAIL
                                                        </label>
                                                        <input class="form-control" id="email" name="email"
                                                            maxlength="50">
                                                        <span class="pmd-textfield-focused"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pmd-card-actions">
                                                <button type="submit" class="btn btn-primary">Simpan</button>

                                                <a class="btn btn-default"
                                                    href="admin.php?component=Pengajuanlegalisir">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="pmd-card app-entry-card">
                                    <div class="text-justify">
                                        <h2 style="margin-left: 40px">Deskripsi prosedur pendaftaran:</h2>
                                        <table style="margin: 40px" border=" 0">
                                            <tr>
                                                <!--<td width="30"><h4 style="font-size: 40px">1</h4></td><td><h5>Mahasiswa mengajukan permohonan seminar/sidang di Prodi masing-masing dengan membawa seluruh persyaratan seminar/sidang tersebut (sesuai aturan prodi masing-masing) beserta <a href="https://seminar-fst.uin-suska.ac.id/akademik/template/formulir.docx" download><span class="fa fa-file-word-o"> Formulir Pengajuan Seminar/Sidang</a> untuk ditanda-tangani Ketua/Sekretaris Prodi atau Koordinator TA/KP.</h5></td>-->
                                                <td width="30">
                                                    <h4 style="font-size: 40px">1</h4>
                                                </td>
                                                <td>
                                                    <h5>Mahasiswa mengajukan permohonan Legalisir Ijazah dengan
                                                        melakukan
                                                        pendaftaran online terlebih dahulu di website ini.</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <!--<td width="30"><h4 style="font-size: 40px">2</h4></td><td><h5>Setelah verifikasi di Prodi selesai, mahasiswa mendaftarkan seminar/sidang secara online untuk pemilihan ruangan dan pembuatan undangan seminar/sidang melalui menu <a href="https://seminar-fst.uin-suska.ac.id/akademik/seminar/peminjaman"><span class="fa fa-external-link-square"> Pendaftaran</span></a> paling lambat 2 hari (selain hari libur) sebelum hari H seminar sebelum pukul 14.00 WIB. Hal tersebut karena mempertimbangkan proses verifikasi, pembuatan, registrasi & penanda-tanganan surat undangan membutuhkan waktu 1-2 hari sebelum penyerahan undangan seminar/sidang ke pembimbing/penguji/ketua sidang sebelum hari H seminar.</h5></td>-->
                                                <td width="30">
                                                    <h4 style="font-size: 40px">2</h4>
                                                </td>
                                                <td>
                                                    <h5>Setelah mengajukan pendaftaran online, siswa mengantarkan FC
                                                        Ijazah ke resepsionis
                                                    </h5>
                                                </td>
                                            </tr>

                                            <!--<tr>
                                <td><h4 style="font-size: 40px">6</h4></td><td><h5>Proses verifikasi setelah pukul 14:00 WIB (Pukul 15.00 WIB jika di luar bulan Ramadhan) Surat Undangan Seminar-nya akan dicetak & diregistrasi untuk tanggal esok harinya (hari efektif kerja).</h5></td>
                            </tr>-->
                                            <tr>
                                                <td>
                                                    <h4 style="font-size: 40px">3</h4>
                                                </td>
                                                <td>Berkas akan di paraf kasubag dan menunggu tanda tanagn kepala
                                                    sekolah
                                                    <h5></h5>
                                                </td>
                                            </tr>
                                            <!--<tr>
                                <td><h4 style="font-size: 40px">4</h4></td><td><h5>Silakan gunakan menu "Tracking Surat" untuk mengetahui status/posisi surat anda. Admin akan mengirimkan email pemberitahuan jika Surat Undangan telah selesai.</h5></td>
                            </tr>-->
                                            <tr>
                                                <td>
                                                    <h4 style="font-size: 40px">4</h4>
                                                </td>
                                                <td>
                                                    <h5>Silakan gunakan menu <a href="pelacakan.php">Pelacakan
                                                            Surat</a> untuk mengetahui status/posisi surat anda. Surat
                                                        selesai &plusmn; 1-2 hari sejak status '<b>Dicetak</b>'.</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 style="font-size: 40px">5</h4>
                                                </td>
                                                <td>
                                                    <h5>Surat yang sudah selesai dapat diambil di Bagian Resepsionis
                                                        MTSN10 Pekanbaru</h5>
                                                </td>
                                            </tr>
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