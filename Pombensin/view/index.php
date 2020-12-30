<?php
session_start();

include_once '../utility/PDO_util.php';
include_once '../controller/usercontroller.php';
include_once '../controller/bahancontroller.php';
include_once '../controller/karyawancontroller.php';
include_once '../controller/membercontroller.php';
include_once '../controller/catatancontroller.php';
include_once '../controller/catatancabangcontroller.php';
include_once '../controller/transaksiController.php';
include_once '../DAO/BahanBakarDAO.php';
include_once '../DAO/CabangDAO.php';
include_once '../DAO/KaryawanDAO.php';
include_once '../DAO/MemberDAO.php';
include_once '../DAO/TransaksiDAO.php';
include_once '../DAO/UserDAO.php';
include_once '../model/bahan_bakar.php';
include_once '../model/cabang.php';
include_once '../model/karyawan.php';
include_once '../model/member.php';
include_once '../model/transaksi.php';
include_once '../model/user.php';

if (!isset($_SESSION['my_session'])) {
    $_SESSION['my_session'] = false;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <title>PHP Navigation and Send Data</title>

        <!-- Icons font CSS-->
        <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <link rel="stylesheet" type="text/css" href="../css/web_style.css">
        <link rel="stylesheet" type="text/css" href="../css/datatables.css">

        <script type="text/javascript" src="../js/functional_js.js"></script>
        <script type="text/javascript" src="../js/controller.js"></script>
    </head>
    <body>
        <!--Tag for header-->
        <header>
            <h1>Pemrograman Web 2</h1>
        </header>
        <!--Tag for navigation-->
        <nav>
            <ul>
                <li><a href="?navito=home">Home</a></li>
                <!--             Punya Umum   -->
                <?php if ($_SESSION['my_session']) { ?>
                    <li><a href="?navito=logout">Log Out</a></li>
                    <?php if ($_SESSION['session_job']  == 'Owner') { ?>
                        <!--             Punya Owner   -->
                        <li><a href="?navito=bahanbakar">Bahan Bakar</a></li>
                        <li><a href="?navito=editkaryawan">Karyawan</a></li>
                        <li><a href="?navito=editmember">Member</a></li>
                        <li><a href="?navito=catatan">Catatan keuangan</a></li>
                        <li><a href="?navito=catatancab">Catatan Cabang</a></li>
                    <?php } else if ($_SESSION['session_job']  == 'Karyawan') { ?>
                        <!--             Punya Karyawan   -->
                        <li><a href="?navito=transaksi">Transaksi</a></li>
                        <li><a href="?navito=showkaryawan">Karyawan</a></li>
                    <?php } else if ($_SESSION['session_job']  == 'member') { ?>
                        <!--             Punya Member  -->
                        <li><a href="?navito=rating">Rating</a></li>
                        <li><a href="poin">Poin</a></li>
                    <?php } ?>
                <?php } else { ?>
                    <li><a href="?navito=login">Log In</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div style="clear:both;"></div>
        <!--Tag for content-->
        <main>
            <?php
            $nav = filter_input(INPUT_GET, "navito");
            switch ($nav) {
//              Umum
                case 'home':
                    include_once 'home.php';
                    break;
                case 'login':
                    $user = new usercontroller();
                    $user->index();
                    break;
                case 'logout':
                    $user = new usercontroller();
                    $user->logout();
                    break;
////              Owner
                case 'bahanbakar':
                    $bahanbakar = new bahancontroller();
                    $bahanbakar->index();
                    break;
                case 'bahan_bakar_update':
                    $bahanbakar = new bahancontroller();
                    $bahanbakar->update();
                    break;
                case 'editkaryawan':
                    $editkar = new karyawancontroller();
                    $editkar->index();
                    break;
                case 'updatekaryawan':
                    $editkar = new karyawancontroller();
                    $editkar->editkaryawan();
                    break;
                case 'editmember':
                    $editmem = new membercontroller();
                    $editmem->index();
                    break;
                case 'member_update':
                    $editmem = new membercontroller();
                    $editmem->update();
                    break;
                case 'catatan':
                    $catatan = new catatancontroller();
                    $catatan->index();
                    break;
                case 'catatancab':
                    $catatan= new catatancabangcontroller();
                    $catatan->index();
                    break;
//              Karyawan
                case 'transaksi':
                    $transaksi = new transaksiController();
                    $transaksi->index();
                    break;
                case 'showkaryawan':
                    $karyawan = new karyawancontroller();
                    $karyawan->topKaryawan();
                    break;
//              Member
                case 'rating':
                    include_once './rating.php';
                    break;
                case 'poin':
                    include_once './poin.php';
                    break;
                default:
                    include_once './home.php';
                    break;
            }
            ?>
        </main>
        <!--Tag for footer-->
        <footer>
            Created by Robby Tan & Modified by Maresha
        </footer>

        <!-- Jquery JS-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="../vendor/select2/select2.min.js"></script>
        <script src="../vendor/datepicker/moment.min.js"></script>
        <script src="../vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="../js/global.js"></script>

        <!-- Datatable -->
        <script type="text/javascript" src="../js/datatables.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tableId').DataTable();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tablecabang').DataTable();
            });
        </script>

    </body>
</html>
