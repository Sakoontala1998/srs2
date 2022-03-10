<?php
include('./navber.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>

<title>ค้นหาเอกสาร</title>
<link href="./css/dataTables.bootstrap4.min.css" rel="stylesheet">


<body>

    <div class="carousel">
        <!-- <div class="container-fluid"> -->
        <!-- <div class="owl-carousel"> -->
        <div class="carousel-item">
            <div class="carousel-img">
                <img src="img/srs.png" alt="Image">
            </div>
            <div class="carousel-text">
                <h1>ค้นหาเอกสาร</h1>
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
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = null;
                                            $sql_search_src_pro = "SELECT *,DATE_FORMAT(pj.date_pj, '%e %M  %Y') AS date_time FROM `project` as pj INNER JOIN model_pj as md ON pj.model_pj = md.id_model_pj INNER JOIN systemsanalyst as sa ON sa.id_sa = pj.id_sa ORDER BY `pj`.`id_pj` ASC;";
                                            foreach(Database::query($sql_search_src_pro,PDO::FETCH_ASSOC) as $row):
                                        ?>
                                        <tr>
                                            <td><?php echo ++$i;?></td>
                                            <td><?php echo $row['title_pj'];?></td>
                                            <td><?php echo $row['name_model_pj'];?></td>
                                            <td><?php echo $row['natitle_sa']." ".$row['name_sa'];?></td>
                                            <td><?php echo $row['date_time'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#md-<?php echo $row['id_pj'];?>" data-whatever="@mdo">รายละเอียด</button>
                                                <a class="btn btn-danger btn-sm" href="report_pdf.php?id=<?php echo $row['id_pj']; ?>">export</a>
                                            </td>
                                            
                                            <div class="modal fade" id="md-<?php echo $row['id_pj'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียดหัวข้อ <?php echo $row['title_pj'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-<?php echo $row['id_pj'];?>" role="tab" aria-controls="v-pills-home" aria-selected="true">ข้อมูลทั่วไป</a>
                                                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-<?php echo $row['id_pj'];?>" role="tab" aria-controls="v-pills-profile" aria-selected="false">บทนำ</a>
                                                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages-<?php echo $row['id_pj'];?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">คำอธิบาย</a>
                                                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings-<?php echo $row['id_pj'];?>" role="tab" aria-controls="v-pills-settings" aria-selected="false">ความต้องการ</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-9">
                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active " style="height: 100%;width: 100%;" id="v-pills-home-<?php echo $row['id_pj'];?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                            <div style="text-align: left;">
                                                                                <h5>ข้อมูลทั่วไป</h5>
                                                                                <h6>ชื่อเรื่อง : <?php echo $row['title_pj'];?></h6>
                                                                                <h6>รูปแบบ : <?php echo $row['name_model_pj'];?></h6>
                                                                                <h6>ชื่อนักวิเคราะห์ : <?php echo $row['natitle_sa']." ".$row['name_sa'];?></h6>
                                                                                <h6>วันที่บันทึกข้อมูล : <?php echo $row['date_time'];?></h6>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="v-pills-profile-<?php echo $row['id_pj'];?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                            <div style="text-align: left;">
                                                                                <h5>บทนำ</h5>
                                                                                <?php echo $row['introduction_con'];?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="v-pills-messages-<?php echo $row['id_pj'];?>" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                            <div style="text-align: left;">
                                                                                <h5>คำอธิบาย</h5>
                                                                                <?php echo $row['description_con'];?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="v-pills-settings-<?php echo $row['id_pj'];?>" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                                                            <div style="text-align: left;">
                                                                                <h5>ความต้องการ</h5>
                                                                                <?php echo $row['need_con'];?>
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
    </div>

    <div class="contact">
        <div class="container">
            <div class="section-header">
                <p>รับการติดต่อ</p>
                <h2>ติดต่อสอบถาม</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>ที่ตั้ง</h3>
                            <p>เลขที่ 1 ถนนราชธานี ตำบลในเมือง อำเภอเมืองอุบลราชธานี จังหวัดอุบลราชธานี 34000</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call for Help</h3>
                            <p> 063-509-1132</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email for Information</h3>
                            <p>sakoontala42@gmail.com</p>
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
</body>
<?php
include('./footer.php');
?>