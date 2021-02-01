<section class="default-news-area">
    <div class="container">
        <h3 class="font-weight-bold text-danger text-center p-5">
            ติดต่อเรา
        </h3>
        <p class="text-center">E-mail: <a href="mailto:zappvariety.news@gmail.com">zappvariety.news@gmail.com</a></p>
        <div class="contact-form">
            <div class="title">
                <h3>กรุณาระบุข้อมูล</h3>
            </div>
            <?php if($result){?>
                <p class="alert alert-success">ส่งข้อความสำเร็จ</p>
            <?php } ?>
            <form id="" action="<?php echo $action; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <small class="font-weight-bold">ชื่อ</small>
                            <input type="text" name="name" class="form-control" id="name" required data-error="*ระบุชื่อ" placeholder="ชื่อ">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <small class="font-weight-bold">นามสกุล</small>
                            <input type="text" name="lname" class="form-control" id="lastname" required data-error="*ระบุนามสกุล" placeholder="นามสกุล">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <small class="font-weight-bold">อีเมล</small>
                            <input type="email" name="email" class="form-control" id="email" required data-error="*ระบุ อีเมล" placeholder="อีเมล">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <small class="font-weight-bold">เบอร์โทรศัพท์</small>
                            <input type="text" name="phone" class="form-control" id="phone_number" required data-error="*ระบุ เบอร์โทรศัพท์" placeholder="เบอร์โทรศัพท์">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <small class="font-weight-bold">หัวข้อ</small>
                            <input type="text" name="topic" class="form-control" id="subject" required data-error="*ระบุ หัวข้อ" placeholder="หัวข้อ">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <small class="font-weight-bold">รายละเอียด</small>
                            <textarea name="detail" id="message" class="form-control" cols="30" rows="6" required data-error="*ระบุ รายละเอียด" placeholder="ระบุรายละเอียด..."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">ติดต่อเรา</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
        <!-- <form action="" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <caption>ชื่อ</caption>
                <input type="text" class="form-control" placeholder="ชื่อ" name="contact_first">
            </div>
            <div class="col-md-6">
                <caption>นามสกุล</caption>
                <input type="text" class="form-control" placeholder="นามสกุล" name="contact_last">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <caption>อีเมล</caption>
                <input type="text" class="form-control" placeholder="อีเมล" name="contact_email">
            </div>
            <div class="col-md-6">
                <caption>เบอร์โทรศัพท์</caption>
                <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" name="contact_tel">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <caption>หัวข้อ</caption>
                <input type="text" class="form-control" placeholder="หัวข้อ" name="contact_subject">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <caption>รายละเอียด</caption>
                <textarea type="text" class="form-control" placeholder="รายละเอียด" name="contact_detail"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-4">
            <button type="submit" class="btn btn-warning">ติดต่อเรา</button>
            </div>
        </div>
        </form> -->
    </div>
</section>