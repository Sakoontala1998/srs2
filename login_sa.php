<?php
include('./navber.php');
?>
<title>เข้าสู่ระบบ</title>


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
                <h1>เข้าสู่ระบบ</h1>
                <form id="form-login" method="POST" action="javascript:void(0);">
                    <div class="form-group">
                        <div class="control-group">
                            <input type="text" class="form-control" name="username_sa" placeholder="Enter Username"required>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="control-group">
                            <input type="password" class="form-control" name="password_sa" placeholder="Enter Password"required>
                        </div>

                    </div>
                    <div class="carousel-btn">
                        <a href="./index.php" class="btn btn-primary">กลับหน้าหลัก</a>
                        <button class="btn" type="submit" id="sendMessageButton">เข้าสู่ระบบ</button>
                        <!-- <a class="btn" href=""></a> -->
                    </div>
                </form>
                <script>
                    $("#form-login").keypress((e) => {
                        if (e.which === 13) {

                        }
                    })

                    $("#form-login").submit(function() {
                        // get all the inputs into an array.
                        var $inputs = $("#form-login :input");
                        var values = {};
                        $inputs.each(function() {
                            values[this.name] = $(this).val();
                        });


                        if (true) {
                            $.ajax({
                                url: "./controller/register_sa_cl.php",
                                type: "POST",
                                // dataType: 'text',
                                data: {
                                    key: "form-login",
                                    data: values,
                                    // form_data: form_data
                                },
                                success: function(result, textStatus, jqXHR) {
                                    console.log(result);
                                    if (result == "success") {
                                        alert("เข้าสู่ระบบเรียบร้อยแล้ว");
                                        // $("#form-login").trigger("reset");
                                        location.assign('./analyst/index.php');

                                    } else {
                                        alert("กรุณาใส่ Username กับ Password ให้ถูกต้อง");
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
        <!-- </div> -->
        <!-- </div> -->
    </div>

</body>

<?php
// include('./footer.php');
?>