<!DOCTYPE html>
<html lang="en">
<?php 
include('./config/config.inc.php');
include_once("./config/connectdb.php");

?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">
    <link rel="icon" href="./img/icon-10.png" type="image/gif" sizes="16x16">
    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">


    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- data table -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"> -->

</head>

<style>
    body {
        font-family: 'Krub';
        font-weight: normal;
    }

    h1 {
        font-family: 'Krub';
        font-weight: bold;

    }
</style>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-bar-left">
                        <div class="text">
                            <i class="far fa-clock"></i>
                            <h2><?php echo date("Y-m-d"); ?></h2>
                            <p><?php echo date('l'); ?></p>
                        </div>
                        <div class="text">
                            <i class="fa fa-phone-alt"></i>
                            <h2>063-509-1132</h2>
                            <p>สำหรับการนัดหมาย</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                        <div class="social">
                            <a href="https://www.facebook.com/sakoontala1998"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark" >
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">SRS System</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link <?php echo strpos("{$_SERVER['PHP_SELF']}",'index.php')== null ? '': 'active'; ?>">หน้าหลัก</a>
                    <a href="search_srs.php" class="nav-item nav-link ">ค้นหาเอกสาร</a>
                    <div class="nav-item dropdown ">
                        <a href="#" class="nav-link dropdown-toggle <?php echo strpos("{$_SERVER['PHP_SELF']}",'login_sa.php')== null ? '': 'active'; ?>" data-toggle="dropdown">เข้าสู่ระบบ</a>
                        <div class="dropdown-menu">
                            <a href="login_sa.php" class="dropdown-item">สำหรับนักวิเคราะห์</a>
                        </div>
                    </div>
                    <a href="./register_sa.php" class="nav-item nav-link <?php echo strpos("{$_SERVER['PHP_SELF']}",'register_sa.php')== null ? '': 'active'; ?>">ลงทะเบียน</a>
                </div>
            </div>
        </div>
    </div>
