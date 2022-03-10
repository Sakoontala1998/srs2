<?php
session_start();
include './navber.php';
?>
<title>หน้าหลัก</title>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>


<body>
    <div class="carousel">

        <div class="carousel-item">
            <div class="carousel-img">
                <img src="../img/srs.png" alt="Image">
            </div>
            <div class="carousel-text">
                <h1>ข้อมูล SRS </h1>
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

    <div class="fact" style="padding-top:0px">
        <div class="container">
            <div class="row ">
                <div class="fact-item">
                    <div class="col-lg-12">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="table-search-SRS" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อเรื่อง</th>
                                            <th>รูปแบบ</th>
                                            <th>ชื่อนักวิเคราะห์</th>
                                            <th>วันที่บันทึกข้อมูล</th>
                                            <th>
                                                <a class="nav-item nav-link" style="color: blue;" data-toggle="modal" data-target="#add_pj" data-whatever="@mdo">เพิ่มข้อมูล SRS</a>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = null;
                                        $sql_search_src_pro = "SELECT *,DATE_FORMAT(pj.date_pj, '%e %M  %Y') AS date_time FROM `project` as pj INNER JOIN model_pj as md ON pj.model_pj = md.id_model_pj INNER JOIN systemsanalyst as sa ON sa.id_sa = pj.id_sa WHERE pj.id_sa = '{$_SESSION['id_sa']}' ORDER BY `pj`.`id_pj` ASC; ";
                                        foreach (Database::query($sql_search_src_pro, PDO::FETCH_ASSOC) as $row) :
                                        ?>
                                            <tr>
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $row['title_pj']; ?></td>
                                                <td><?php echo $row['name_model_pj']; ?></td>
                                                <td><?php echo $row['natitle_sa'] . " " . $row['name_sa']; ?></td>
                                                <td><?php echo $row['date_time']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#md-<?php echo $row['id_pj']; ?>" data-whatever="@mdo">รายละเอียด</button>
                                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ed-<?php echo $row['id_pj']; ?>" data-whatever="@mdo">แก้ไข</a>
                                                    <a class="btn btn-danger btn-sm" href="./reportsrs_pdf.php?id=<?php echo $row['id_pj']; ?>">export</a>
                                                    <a class="btn btn-danger btn-sm" href="javascript:detele_pj(<?php echo $row['id_pj']; ?>)">ลบ</a>
                                                    
                                                </td>

                                                <div class="modal fade" id="md-<?php echo $row['id_pj']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดหัวข้อ <?php echo $row['title_pj']; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $row['id_pj']; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">ข้อมูลทั่วไป</a>
                                                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-<?php echo $row['id_pj']; ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false">บทนำ</a>
                                                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages-<?php echo $row['id_pj']; ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">คำอธิบาย</a>
                                                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings-<?php echo $row['id_pj']; ?>" role="tab" aria-controls="v-pills-settings" aria-selected="false">ความต้องการ</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <div class="tab-pane fade show active " style="height: 100%;width: 100%;" id="v-pills-home-<?php echo $row['id_pj']; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                                <div style="text-align: left;">
                                                                                    <h5>ข้อมูลทั่วไป</h5>
                                                                                    <h6>ชื่อเรื่อง : <?php echo $row['title_pj']; ?></h6>
                                                                                    <h6>รูปแบบ : <?php echo $row['name_model_pj']; ?></h6>
                                                                                    <h6>ชื่อนักวิเคราะห์ : <?php echo $row['natitle_sa'] . " " . $row['name_sa']; ?></h6>
                                                                                    <h6>วันที่บันทึกข้อมูล : <?php echo $row['date_time']; ?></h6>
                                                                                </div>

                                                                            </div>
                                                                            <div class="tab-pane fade" id="v-pills-profile-<?php echo $row['id_pj']; ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                                <div style="text-align: left;">
                                                                                    <h5>บทนำ</h5>
                                                                                    <?php echo $row['introduction_con']; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="v-pills-messages-<?php echo $row['id_pj']; ?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                                <div style="text-align: left;">
                                                                                    <h5>คำอธิบาย</h5>
                                                                                    <?php echo $row['description_con']; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="v-pills-settings-<?php echo $row['id_pj']; ?>" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                                                                <div style="text-align: left;">
                                                                                    <h5>ความต้องการ</h5>
                                                                                    <?php echo $row['need_con']; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="ed-<?php echo $row['id_pj']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">แก้ไขหัวข้อ : <?php echo $row['title_pj']; ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="form-edit-pj-<?php echo $row['id_pj']; ?>" action="javascript:void(0)" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-group" style="text-align: left;">
                                                                        <input type="hidden" name="id_sa-<?php echo $row['id_pj']; ?>" value="<?php echo $_SESSION['id_sa']; ?>" required>
                                                                        <div class="control-group">
                                                                            <label class="control-label">รูปแบบ</label>
                                                                            <select class="form-control" name="model_pj-<?php echo $row['id_pj']; ?>" required>
                                                                                <option value="<?php echo $row['id_model_pj']; ?>" disabled selected><?php echo $row['name_model_pj']; ?></option>
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
                                                                                <input class="form-control" type="text" name="title_pj-<?php echo $row['id_pj']; ?>" maxlength="100" placeholder="ตั้งชื่อเรื่อง" value="<?php echo $row['title_pj']; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="control-group">
                                                                                <label class="control-label">บทนำ</label>
                                                                                <textarea id="introduction_con-<?php echo $row['id_pj']; ?>" name="introduction_con-<?php echo $row['id_pj']; ?>" class="form-control" required><?php echo $row['introduction_con'] ?></textarea>
                                                                                <script>
                                                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                                                    // instance, using default configuration.
                                                                                    CKEDITOR.replace('introduction_con-<?php echo $row['id_pj']; ?>');

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
                                                                                <textarea id="need_con-<?php echo $row['id_pj']; ?>" name="need_con-<?php echo $row['id_pj']; ?>" class="form-control" required><?php echo $row['need_con'] ?></textarea>
                                                                                <script>
                                                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                                                    // instance, using default configuration.
                                                                                    CKEDITOR.replace('need_con-<?php echo $row['id_pj']; ?>');

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
                                                                                <textarea id="description_con-<?php echo $row['id_pj']; ?>" name="description_con-<?php echo $row['id_pj']; ?>" class="form-control" required><?php echo $row['description_con'] ?></textarea>
                                                                                <script>
                                                                                    // Replace the <textarea id="editor1"> with a CKEditor
                                                                                    // instance, using default configuration.
                                                                                    CKEDITOR.replace('description_con-<?php echo $row['id_pj']; ?>');

                                                                                    function CKupdate() {
                                                                                        for (instance in CKEDITOR.instances)
                                                                                            CKEDITOR.instances[instance].updateElement();
                                                                                    }
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                    <button type="submit" class="btn btn-primary">ยืนยันแก้ไข</button>
                                                                </div>

                                                            </form>
                                                        </div>


                                                        <script>
                                                            $("#ed-<?php echo $row['id_pj']; ?>").keypress((e) => {
                                                                if (e.which === 13) {

                                                                }
                                                            })

                                                            $("#ed-<?php echo $row['id_pj']; ?>").submit(function() {
                                                                // get all the inputs into an array.
                                                                var $inputs = $("#ed-<?php echo $row['id_pj']; ?> :input");
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
                                                                            key: "ed-form",
                                                                            data: values,
                                                                            id: <?php echo $row['id_pj']; ?>
                                                                            // form_data: form_data
                                                                        },
                                                                        success: function(result, textStatus, jqXHR) {
                                                                            console.log(result);
                                                                            if (result == "success") {
                                                                                alert("แก้ไขเอกสารสำเร็จ");
                                                                                // $("#ed-<?php echo $row['id_pj']; ?>").trigger("reset");
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
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function() {
                // table_el();
                $('#table-search-SRS').DataTable({
                    dom: 'lBfrtip',
                    lengthMenu: [
                        [10, 25, 50, 60, -1],
                        [10, 25, 50, 60, "All"]
                    ],
                    language: {
                        sProcessing: "กำลังดำเนินการ...",
                        sLengthMenu: "แสดง_MENU_ แถว",
                        sZeroRecords: "ไม่พบข้อมูล",
                        sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                        sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
                        sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
                        sInfoPostFix: "",
                        sSearch: "ค้นหา:",
                        sUrl: "",
                        oPaginate: {
                            "sFirst": "เริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
                        }
                    },

                    // sInfoEmpty: "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    processing: true, // แสดงข้อความกำลังดำเนินการ กรณีข้อมูลมีมากๆ จะสังเกตเห็นง่าย
                    //serverSide: true, // ใช้งานในโหมด Server-side processing
                    order: [], // กำหนดให้ไม่ต้องการส่งการเรียงข้อมูลค่าเริ่มต้น จะใช้ค่าเริ่มต้นตามค่าที่กำหนดในไฟล์ php

                    retrieve: true
                });
            });
        </script>
        <script>
            function detele_pj(id) {
                if (confirm('คุณต้องการลบข้อมูลหรือไม่')) {
                    $.ajax({
                        url: "./controller/update_project.php",
                        type: "POST",
                        // dataType: 'text',
                        data: {
                            key: "dd-form",
                            id_pj: id,
                            // form_data: form_data
                        },
                        success: function(result, textStatus, jqXHR) {
                            console.log(result);
                            if (result == "success") {
                                // alert("ลบสำเร็จ");
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
            }
        </script>
</body>

<?php
include './footer.php';
?>