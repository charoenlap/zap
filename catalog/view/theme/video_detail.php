<section class="main-hot-news">
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content text-center">
                <h2 class="font-weight-bold text-danger"><?php echo $content['result']['title']; ?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2 pl-1 pr-1">
                <?php if(!empty($content['result']['link'])){ ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $content['result']['link']; ?>" allowfullscreen></iframe>
                </div>
                <?php }/*else{ ?>
                    <p class="text-center alert alert-danger">ไม่พบวีดีโอ</p>
                <?php }*/ ?>
            </div>
        </div>
    </div>
    
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-10">
                <h5 class="text-danger text-center font-weight-bold"><?php echo $content['result']['title']; ?></h5>
                <span class="text-warning" style="font-size: 12px;"><?php echo $content['result']['date_create']; ?></span>
                <?php echo html_entity_decode($content['result']['detail']); ?>
                <hr>
            </div>
            <div class="col-md-2">
                <div class="top-header-social">
                    <div style="margin: 5px;">
                        <div class="fb-share-button" data-href="<?php echo MURL.'index.php?route=video/video_detail&id='.get('id'); ?>" data-layout="button_count" data-size="small"><a target="_blank" href="<?php echo MURL.'index.php?route=video/video_detail&id='.get('id'); ?>" class="fb-xfbml-parse-ignore">Share</a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php /*<div class="container">
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#อีรัน</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#สถานเอกอัครราชทูตไทย</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#กรุงโซล</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#เกาหลีใต้</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#คนไทยในเกาหลีใต้</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#ประกาศเตือน</a>
            <a class="badge badge-secondary text-light" href="<?php echo route('cat'); ?>">#โควิด-19</a>
        </div>*/ ?>
    </div>
</section>

<section class="main-hot-news">
    <div class="contain text-center">
        <h3 class="font-weight-bold text-danger" style="padding-top: 50px;">คลิปที่เกี่ยวข้อง</h3>
        <hr style="color: white;">
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($related as $key => $value) { ?>
            <div class="col-sm-3 mb-2 pl-1 pr-1">
                <a href="<?php echo route('video/video_detail&id='.$value['id'].'&text='.$value['result']['title']); ?>">
                    <div class="video-item">
                        <div class="video-news-image">
                                <img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($value['img_title']); ?>,400,300" alt="image">
                                <i class='bx bx-play-circle'></i>
                        </div>
                        <!-- <div class="video-news-content">
                            <h3>
                                <a href="<?php echo route('video/video_detail&id='.$value['id']) ?>">
                                    <?php echo $value['result']['title']; ?>
                                </a>
                            </h3>
                        </div> -->
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php /*
<section class="main-hot-news">
    <div class="contain text-center">
        <h3 class="font-weight-bold text-danger" style="padding-top: 50px;">คลิปทั้งหมดในหมวดนี้</h3>
        <hr style="color: white;">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 mb-2 pl-1 pr-1">
                <a href="<?php echo route('video/video_detail') ?>">
                    <div class="video-item">
                        <div class="video-news-image">
                            <img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
                            <i class='bx bx-play-circle'></i>
                        </div>
                        <div class="video-news-content">
                            <h3>
                                <a href="<?php echo route('video/video_detail') ?>">
                                    น้ำตามหาแม่ พลัดพราก 24 ปี EP.6
                                </a>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 mb-2 pl-1 pr-1">
                <a href="<?php echo route('video/video_detail') ?>">
                    <div class="video-item">
                        <div class="video-news-image">
                            <img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
                            <i class='bx bx-play-circle'></i>
                        </div>
                        <div class="video-news-content">
                            <h3>
                                <a href="<?php echo route('video/video_detail') ?>">
                                    น้ำตามหาแม่ พลัดพราก 24 ปี EP.6
                                </a>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 mb-2 pl-1 pr-1">
                <a href="<?php echo route('video/video_detail') ?>">
                    <div class="video-item">
                        <div class="video-news-image">
                            <img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
                            <i class='bx bx-play-circle'></i>
                        </div>
                        <div class="video-news-content">
                            <h3>
                                <a href="<?php echo route('video/video_detail') ?>">
                                    น้ำตามหาแม่ พลัดพราก 24 ปี EP.6
                                </a>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
*/ ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v9.0&appId=1140190572668464&autoLogAppEvents=1" nonce="HruokkHY"></script>