<?php
include('./navber.php');
?>
<title>หน้าหลัก</title>
<!-- <link rel="icon" href="https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type="image/x-icon"> -->

<body>
    <div class="carousel">
        <div class="carousel-item">
            <div class="carousel-img">
                <img src="img/srs.png" alt="Image">
            </div>
            <div class="carousel-text">
                <h1>ระบบจัดการเอกสาร</h1>
                <p>
                    เอกสาร Software Requirement Specification สร้างขึ้นตามมาตรฐาน SRS ระบุข้อกำหนดของระบบซอฟต์แวร์ ประกอบด้วยรายละเอียดของระบบที่ต้องพัฒนา รวมถึงวิธีที่ผู้ใช้โต้ตอบกับระบบโดยใช้กรณีการใช้งาน กรณีการใช้งานให้คำอธิบายของการดำเนินการที่เกิดขึ้นระหว่างผู้ใช้และระบบซอฟต์แวร์ โดยปกติแล้ว UML (Unified Modeling Language) จะใช้เพื่อระบุกรณีการใช้งานอย่างเป็นทางการใน SRS นอกจากนี้ยังมีข้อกำหนดที่ไม่สามารถใช้งานได้ เช่นข้อกำหนดด้านประสิทธิ ภาพมาตรฐานที่ระบบต้องการและข้อจำกัดใด ๆ ในระบบ SRS ควรถูกต้องและสอดคล้องกันเสมอเนื่องจากนักพัฒนาใช้ในกระบวนการพัฒนา
                </p>
                <div class="carousel-btn">

                </div>
            </div>
        </div>

    </div>

    <div class="team">
        <div class="container">
            <div class="section-header">
                <p>ข้อมูลทีม</p>
                <h2>ทีมผู้พัฒนาระบบ</h2>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/pro2.jpg" alt="Team Image">
                        </div>
                        <div class="team-text">
                            <h2>ศกุลตลา สิทธิกาล</h2>
                            <p></p>
                            <div class="team-social">
                                <a href="https://www.facebook.com/sakoontala1998"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/pro1.jpg" alt="Team Image">
                        </div>
                        <div class="team-text">
                            <h2>ชลธิชา ศรีสุวรรณ</h2>
                            <p></p>
                            <div class="team-social">
                                <a href="https://www.facebook.com/profile.php?id=100011702805970"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Contact Start -->
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
</body>
<?php
include('./footer.php');
?>