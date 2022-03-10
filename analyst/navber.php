<!DOCTYPE html>
<html lang="en">
<?php
include('../config/config.inc.php');
include_once("../config/connectdb.php");

// session_start();
// echo $_SESSION['key'];
if(isset($_SESSION['key']) && $_SESSION['key'] == 'sa'){

}else{
    header("Location: ../index.php");
}

?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Consulting Website Template Free Download" name="keywords">
    <meta content="Consulting Website Template Free Download" name="description">
    <link rel="icon" href="../img/icon-10.png" type="image/gif" sizes="16x16">

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

    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <script type="text/javascript" src="../lib/ckeditor/ckeditor.js"></script>
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
                            <p>สำหรับการนัดหมาย <?php echo $_SESSION['key'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                        <div class="social">
                            <!-- <a href=""><i class="fab fa-twitter"></i></a> -->
                            <a href="https://www.facebook.com/sakoontala1998"><i class="fab fa-facebook-f"></i></a>
                            <!-- <a href=""><i class="fab fa-linkedin-in"></i></a> -->
                            <!-- <a href=""><i class="fab fa-instagram"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">SRS System</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link <?php echo strpos("{$_SERVER['PHP_SELF']}", 'index.php') == null ? '' : 'active'; ?>">ข้อมูล SRS</a>
                    <!-- <a href="search_srs.php" class="nav-item nav-link ">เพิ่มข้อมูล SRS</a> -->
                    <!-- <a class="nav-item nav-link " data-toggle="modal" data-target="#add_pj" data-whatever="@mdo">เพิ่มข้อมูล SRS</a> -->

                    <a href="about.php" class="nav-item nav-link ">ข้อมูลส่วนตัว</a>

                    <!-- <a href="service.html" class="nav-item nav-link">Service</a>
                    <a href="feature.html" class="nav-item nav-link">Feature</a>
                    <a href="advisor.html" class="nav-item nav-link">Advisor</a>
                    <a href="review.html" class="nav-item nav-link">Review</a> -->

                    <!-- <a href="contact.html" class="nav-item nav-link">ติดต่อ</a> -->

                    <a href="./logout.php" class="nav-item nav-link ">ออกจากระบบ</a>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="add_pj" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">เพิ่มข้อมูล SRS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-add_pj" action="javascript:void(0)" method="POST">
                    <div class="modal-body">
                        <div class="form-group" style="text-align: left;">
                            <input type="hidden" name="id_sa" value="<?php echo $_SESSION['id_sa']; ?>" required>
                            <div class="control-group">
                                <label class="control-label">รูปแบบ</label>
                                <select class="form-control" name="model_pj" required>
                                    
                                    <?php
                                    $sql_select = "SELECT * FROM `model_pj`";
                                    foreach (Database::query($sql_select, PDO::FETCH_ASSOC) as $select) :
                                    ?> ?>
                                        <option value="<?php echo $select['id_model_pj'] ?>"><?php echo $select['name_model_pj'] ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" style="margin-top: 5px;">
                                <div class="control-group">
                                    <label class="control-label">ชื่อเรื่อง</label>
                                    <input class="form-control" type="text" name="title_pj" maxlength="100" placeholder="ตั้งชื่อเรื่อง" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <label class="control-label">บทนำ</label>
                                    <textarea id="introduction_con" name="introduction_con" class="form-control" required > <?php echo "" ?></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        // CKEDITOR.replace('introduction_con');

                                        function CKupdate() {
                                            for (instance in CKEDITOR.instances)
                                                CKEDITOR.instances[instance].updateElement();
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <label class="control-label">ความต้องการ</label>
                                    <textarea id="need_con" name="need_con" class="form-control" required><?php echo "" ?></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        // CKEDITOR.replace('need_con');

                                        function CKupdate() {
                                            for (instance in CKEDITOR.instances)
                                                CKEDITOR.instances[instance].updateElement();
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <label class="control-label">คำอธิบาย</label>
                                    <textarea id="description_con" name="description_con" class="form-control" required><?php echo "" ?></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        // CKEDITOR.replace('description_con');

                                        function CKupdate() {
                                            for (instance in CKEDITOR.instances)
                                                CKEDITOR.instances[instance].updateElement();
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ยืนยันเพิ่มเอกสาร</button>
                    </div>

                </form>
            </div>


            <script>
                $("#form-add_pj").keypress((e) => {
                    if (e.which === 13) {

                    }
                })

                $("#form-add_pj").submit(function() {
                    // get all the inputs into an array.
                    var $inputs = $("#form-add_pj :input");
                    var values = {};
                    $inputs.each(function() {
                        values[this.name] = $(this).val();
                    });

                    console.log(JSON.stringify(values))
                    if (true) {
                        $.ajax({
                            url: "./controller/update_project.php",
                            type: "POST",
                            // dataType: 'text',
                            data: {
                                key: "form-add_pj",
                                data: values,
                                // form_data: form_data
                            },
                            success: function(result, textStatus, jqXHR) {
                                console.log(result);
                                if (result == "success") {
                                    alert("เพิ่มข้อมูลสำเร็จ");
                                    // $("#ed").trigger("reset");
                                    // location.assign('./analyst/index.php');
                                    location.reload();

                                } else {
                                    alert("กรุณาตรวจสอบและลองใหม่อีกครั้ง");
                                    location.reload();
                                }
                                // console.log(JSON.stringify(values));
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(result);
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
    <!-- Nav Bar End -->