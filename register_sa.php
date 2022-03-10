<?php
include('./navber.php');
?>

<title>ลงทะเบียน</title>

<!-- Fact Start -->

<body>

    <div class="carousel">
        <!-- <div class="container-fluid"> -->
        <!-- <div class="owl-carousel"> -->
        <div class="carousel-item">
            <div class="carousel-img">
                <img src="img/srs.png" alt="Image">
            </div>
            <div class="carousel-text">
                <h1>ลงทะเบียน</h1>

            </div>
        </div>
    </div>

    <div class="contact mt-125">
        <div class="container">
            <div class="section-header">
                <p></p>
                <h2>ลงทะเบียนเพื่อเข้าสู่ระบบ</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form id="form-register" action="javascript:void(0);" method="POST">
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="username_sa" placeholder="Username" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="password" class="form-control" name="password_sa" placeholder="Password" required pattern="[A-Za-z0-9]{5,}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <select class="form-control" name="natitle_sa" required>
                                        <option value="" disabled selected>เลือกคำนำหน้า</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                    <!-- <input type="email" class="form-control" placeholder=""> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="name_sa" placeholder="ชื่อ-นามสกุล" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="date" class="form-control" name="birthday_sa" placeholder="วันเกิด" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="email_sa" placeholder="E-Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <textarea class="form-control" rows="5" name="addresr_sa" placeholder="ตำบล อำเภอ จังหวัด" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="zipcode_sa" placeholder="รหัสไปรษณีย์" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="phone_sa" placeholder="เบอร์โทรติดต่อ" pattern="[0-9]{10}" required>
                                </div>
                            </div>
                            <div class="carousel-btn">
                                <a href="./login_sa.php" class="btn btn-primary">ยกเลิก</a>
                                <button class="btn" type="submit" id="sendMessageButton">ลงทะเบียน</button>
                            </div>
                        </form>
                        <script>
                            $("#form-register").keypress((e) => {
                                if (e.which === 13) {

                                }
                            })

                            $("#form-register").submit(function() {
                                // get all the inputs into an array.
                                var $inputs = $("#form-register :input");
                                var values = {};
                                $inputs.each(function() {
                                    values[this.name] = $(this).val();
                                });

                                console.log(JSON.stringify(values));
                                if (true) {
                                    $.ajax({
                                        url: "./controller/register_sa_cl.php",
                                        type: "POST",
                                        // dataType: 'text',
                                        data: {
                                            key: "form-register",
                                            data: values,
                                            // form_data: form_data
                                        },
                                        success: function(result, textStatus, jqXHR) {
                                            console.log(result);
                                            if (result == "success") {
                                                alert("ลงทะเบียนสำเร็จ ลองเข้าสู่ระบบอีกครั้ง");
                                                // $("#form-register").trigger("reset");
                                                location.assign('./login_sa.php');

                                            } else {
                                                alert("เกิดข้อผิดพลาดบางอย่าง");
                                                // location.reload();
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
        </div>
    </div>
</body>

<?php
// include('./footer.php');
?>