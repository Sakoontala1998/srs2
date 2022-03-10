<?php
session_start();
include('./navber.php');

$sql_sa = "SELECT *,DATE_FORMAT(birthday_sa, '%e %M  %Y') AS date_ FROM `systemsanalyst` WHERE id_sa ='{$_SESSION['id_sa']}'";
$row = Database::query($sql_sa, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
?>
<title>ข้อมูลส่วนตัว</title>
<body>

    <div class="carousel">
        <!-- <div class="container-fluid"> -->
        <!-- <div class="owl-carousel"> -->
        <div class="carousel-item">
            <div class="carousel-img">
                <img src="../img/srs.png" alt="Image">
            </div>
            <div class="carousel-text">
                <h1>ข้อมูลส่วนตัว</h1>
                <p>
                    <!-- เอกสาร Software Requirement Specification สร้างขึ้นตามมาตรฐาน SRS ระบุข้อกำหนดของระบบซอฟต์แวร์ ประกอบด้วยรายละเอียดของระบบที่ต้องพัฒนา รวมถึงวิธีที่ผู้ใช้โต้ตอบกับระบบโดยใช้กรณีการใช้งาน กรณีการใช้งานให้คำอธิบายของการดำเนินการที่เกิดขึ้นระหว่างผู้ใช้และระบบซอฟต์แวร์ โดยปกติแล้ว UML (Unified Modeling Language) จะใช้เพื่อระบุกรณีการใช้งานอย่างเป็นทางการใน SRS นอกจากนี้ยังมีข้อกำหนดที่ไม่สามารถใช้งานได้ เช่นข้อกำหนดด้านประสิทธิ ภาพมาตรฐานที่ระบบต้องการและข้อจำกัดใด ๆ ในระบบ SRS ควรถูกต้องและสอดคล้องกันเสมอเนื่องจากนักพัฒนาใช้ในกระบวนการพัฒนา -->
                </p>
                <div class="carousel-btn">
                    <!-- <a class="btn" href=""><i class="fa fa-link"></i>Get Started</a>
                        <a class="btn btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal"><i class="fa fa-play"></i>Watch Video</a> -->
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
    </div>
    <div class="contact">
        <div class="container">
            <div class="section-header">
                <!-- <p>รับการติดต่อ</p> -->
                <h2>ข้อมูลส่วนตัว</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>ข้อมูลล็อกอิน</h3>
                            <p>UserName : <?php echo $row['username_sa']; ?></p>
                            <p>Password : <?php echo $row['password_sa']; ?></p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>ข้อมูลทั่วไป</h3>
                            <p>ชื่อ - สกุล : <?php echo $row['natitle_sa'] . " " . $row['name_sa'] ?></p>
                            <p>วันเกิด : <?php echo $row['date_'] ?></p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>สถานที่ติดต่อ</h3>
                            <p>ที่อยู่: <?php echo $row['addresr_sa'] ?></p>
                            <p>รหัสไปรษณี: <?php echo $row['zipcode_sa'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call for Help</h3>
                            <p> <?php echo $row['phone_sa'] ?></p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email for Information</h3>
                            <p><?php echo $row['email_sa'] ?></p>
                        </div>
                    </div>
                    <!-- <a class="nav-item nav-link" style="color: blue;" data-toggle="modal" data-target="#add_pro_sa" data-whatever="@mdo">แก้ไขข้อมูลส่วนตัว</a> -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_pro_sa" data-whatever="@mdo">แก้ไขข้อมูลส่วนตัว</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_pro_sa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">แก้ไขข้อมูลส่วนตัว</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_pro_sa" action="javascript:void(0)" method="POST">
                    <input type="hidden" name="id_sa" value="<?php echo $_SESSION['id_sa']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="control-group">
                                <input type="text" class="form-control" name="username_sa" placeholder="Enter Username"  required value="<?php echo $row['username_sa']; ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="password" class="form-control" name="password_sa" placeholder="Enter Password" required pattern="[A-Za-z0-9]{5,}" value="<?php echo $row['password_sa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <select class="form-control" name="natitle_sa" required>
                                    <option value="<?php echo $row['natitle_sa']; ?>" disabled selected><?php echo $row['natitle_sa']; ?></option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                                <!-- <input type="email" class="form-control" placeholder=""> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="text" class="form-control" name="name_sa" placeholder="ชื่อ-นามสกุล" required  value="<?php echo $row['name_sa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="date" class="form-control" name="birthday_sa" placeholder="วันเกิน" required value="<?php echo $row['birthday_sa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="text" class="form-control" name="email_sa" placeholder="E-Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?php echo $row['email_sa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <textarea class="form-control" rows="5" name="addresr_sa" placeholder="ตำบล อำเภอ จังหวัด" required><?php echo $row['addresr_sa']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="text" class="form-control" name="zipcode_sa" placeholder="รหัสไปรษณีย์" required value="<?php echo $row['zipcode_sa']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <input type="text" class="form-control" name="phone_sa" placeholder="เบอร์โทรติดต่อ" pattern="[0-9]{10}" required value="<?php echo $row['phone_sa']; ?>">
                            </div>
                        </div>
                        <div class="carousel-btn">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button class="btn btn-primary" type="submit" >บันทึกแก้ไขข้อมูล</button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ยืนยันแก้ไข</button> -->

                    </div>
                </form>
                <script>
                    $("#add_pro_sa").keypress((e) => {
                        if (e.which === 13) {

                        }
                    })

                    $("#add_pro_sa").submit(function() {
                        // get all the inputs into an array.
                        var $inputs = $("#add_pro_sa :input");
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
                                    key: "add_pro_sa",
                                    data: values,
                                    // form_data: form_data
                                },
                                success: function(result, textStatus, jqXHR) {
                                    console.log(result);
                                    if (result == "success") {
                                        alert("แก้ไขข้อมูลสำเร็จ");
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
    </div>
</body>


<?php
include('./footer.php');
?>