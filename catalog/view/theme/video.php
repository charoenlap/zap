<section class="main-hot-news">
    <div class="contain text-center">
        <h3 class="font-weight-bold text-danger" style="padding: 20px;">วีดีโอ</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-2">
                <ul class="list-group">
                    <li class="list-group-item font-weight-bold"><a href="<?php echo route('home') ?>">หน้าแรก</a></li>
                    <?php foreach ($menu as $key => $value) { ?>
                    <li class="list-group-item font-weight-bold">
                        <a href="<?php echo route('cat&id='.$value['id']); ?>">
                            <?php echo $value['title']; ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php foreach($vdo as $val){ ?>
                    <div class="col-md-6 mb-3">
                        <a href="<?php echo route('video/video_detail&id='.$val['id'].'&text='.$val['result']['title']); ?>">
                            <div class="video-item">
                                <div class="video-news-image">
                                    <!-- <img src="<?php echo MURL; ?>img.php?file=2,<?php echo $val['cover']; ?>,455,200" alt="image"> -->
                                    <img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,500,200" alt="image">
                                    <i class='bx bx-play-circle'></i>
                                </div>
                                <!-- <div class="video-news-content">
                                    <h3>
                                        <?php echo $val['result']['title']; ?>
                                    </h3>
                                </div> -->
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <!-- <div class="pagination-area text-center m-3">
                    <a href="#" class="prev page-numbers">
                        <i class='bx bx-chevron-left'></i>
                    </a>
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="#" class="page-numbers">2</a>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="page-numbers">4</a>
                    <a href="#" class="next page-numbers">
                        <i class='bx bx-chevron-right'></i>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</section>