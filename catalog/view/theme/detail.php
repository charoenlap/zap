<img src="img.php?file=2,<?php echo MURL.$content['cover']; ?>,700,700" alt="" style="display:none;">
<section class="main-hot-news">
    <div style="background-color: black; padding-top:50px;">
        <div class="container">
            <h6 class="text-light">
                <?php foreach($header_title as $val){ ?>
                    <span class="badge badge-danger"><?php echo $val['title']; ?></span> 
                <?php } ?>
                <?php echo $content['result']['date_create']; ?></h6>
            <div class="row">
                <div class="col">
                    <div class="single-most-popular-news">
                        <div class="popular-news-content">
                            <h5 class="font-weight-bold text-light"><?php echo $content['result']['title']; ?></h5>
                            <!-- <h6 class="font-weight-bold text-light">เขียนโดย <span class="text-danger font-weight-bold"></span></h6> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //echo $content['cover']; ?>
    <!-- <div class="container-fluid-img-overlay wrapper">
        <img src="img.php?file=2,<?php echo $content['cover']; ?>,1200,300" alt="<?php echo $content['result']['title']; ?>" 
        class="img-cover-detail-size img-reponsive img-reponsive-center ">
    </div> -->
    <!-- <img src="<?php echo $content['cover']; ?>" class="w-100"> -->
    <div class="container">
    	<img src="<?php echo MURL; ?>img.php?file=2,<?php echo $content['img_title']; ?>,1920,1080" class="w-100" alt="<?php echo $content['result']['title']; ?>">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-2 pl-1 pr-1">
                <?php if(!empty($content['link'])){ ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo $content['link']; ?>" allowfullscreen></iframe>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            
            <!-- <div class="col-md-1 top-header-social">
                <h6 class="badge badge-pill badge-primary" style="font-size: 16px; margin-top: 20px;">แชร์</h6>
                <li style="margin: 5px;">
                    <a href="#" class="facebook" target="_blank">
                            <i class='bx bxl-facebook'></i>
                    </a>
                </li>
                <br>
                <li style="margin: 5px;">
                    <a href="#" class="twitter" target="_blank">
                            <i class='bx bxl-twitter'></i>
                    </a>
                </li>
            </div> -->
            <div class="col-md-9 " style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <p><i class="bx bx-show-alt view-size"></i> <?php echo (isset($countview['count'])?$countview['count']:"0"); ?></p>
                    </div>
                </div>
                <h5 class="text-danger text-center font-weight-bold"><?php echo $content['result']['title']; ?></h5>
                <div class="content-detail">
                    <?php echo html_entity_decode($content['result']['detail']); ?>
                </div>
                
                
                <!-- <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="<?php echo route('detail&id='.$related[0]['result']['id'].'&text='.$related[0]['result']['title']); ?>">
                            < อ่านข่าวก่อนหน้า
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary" href="<?php echo route('detail&id='.$related[1]['result']['id'].'&text='.$related[1]['result']['title']); ?>">
                            อ่านข่าวถัดไป >
                        </a>
                    </div>
                </div>   -->
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h2>รูปภาพเพิ่มเติม</h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($img as $val){?>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo MURL.$val['path'];?>" target="_blank">
                                <!-- <img src="img.php?file=2,<?php echo $val['path'];?>,300,300" alt="image"> -->
                                <img src="<?php echo MURL; ?>img.php?file=2,<?php echo $val['path']; ?>,300,300" alt="image">
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- comment facebook -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="fb-comments" data-href="https://www.zappvariety.com/news/<?php echo get('id'); ?>/" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-title" style="margin-top: 20px;">
                    <h2 class="font-weight-bold text-danger">ข่าวที่เกี่ยวข้อง</h2>
                </div>
                <?php foreach($related as $val){ 
                    ?>
                <a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.$val['result']['title']); ?>" class="text-decoration-none">
                    <div class="single-most-popular-news">
                        <div class="popular-news-image">
                            <img src="<?php echo photo($val['cover']); ?>" alt="<?php echo $val['cover']; ?>">
                        </div>
                        <div class="popular-news-content">
                            <span class="font-weight-bold"><?php echo $val['result']['title']; ?></span>
                        </div>
                    </div>
                </a>
                <hr>
                <?php } ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 article-footer">
                <div class="article-share">
                    <ul class="social">
                        <li>
                             <div class="fb-share-button" data-href="<?php echo route('detail&id='.get('id')); ?>&title=<?php echo urlencode($content['result']['title']); ?>" data-layout="button_count" data-size="small">
                                <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo route('detail&id='.get('id')); ?>&title=<?php echo urlencode($content['result']['title']); ?>" class="fb-xfbml-parse-ignore">Share</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v9.0&appId=401569140584327&autoLogAppEvents=1" nonce="6KFA9zDm"></script> -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v9.0&appId=1140190572668464&autoLogAppEvents=1" nonce="HruokkHY"></script>