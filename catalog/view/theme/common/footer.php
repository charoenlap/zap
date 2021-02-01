<section class="footer-area">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="single-footer-widget">
              <a href="<?php echo route('home'); ?>">
                <img src="https://zappvariety.com/html/assets/img/Logo_Zapp-variety01.png" alt="image" class="footer-logo">
              </a>
              <ul class="social">
                <li>
                    <a href="https://www.facebook.com/zappvariety.news" class="" target="_blank">
                        <i class='bx bxl-facebook color-facebook'></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/zapp_variety/" class="" target="_blank">
                        <i class='bx bxl-instagram color-instagram'></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UC5-8XgmQf4kEfl3OXDCca0g" class="" target="_blank">
                        <i class='bx bxl-youtube color-youtube'></i>
                    </a>
                </li>
                <!-- <li>
                  <a href="<?php echo route('contact'); ?>" class="" target="_blank">
                       ติดต่อเรา
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <p class="text-white mb-0">สนใจลงโฆษณา</p>
            <p class="text-white mb-0">E-mail : <a href="mailto:appvariety.news@gmail.com" class="text-white">zappvariety.news@gmail.com</a> โทร. <a href="tel:0926594496" class="text-white">092-6594496</a>, <a href="tel:0918509186" class="text-white">091-8509186</a></p>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 justify-content-center">
        <ul class="menu-footer list-unstyled pt-5">
          <?php 
            foreach ($menu as $key => $value) { 
              if ($key < 6) {
          ?>
          <li class="mb-2"><a href="<?PHP echo route('cat&id='.$value['id'].'&text='.$value['title']); ?>" class="text-white"><strong><?php echo $value['title']; ?></strong></a></li>
          <?php } ?>
          <?php } ?>
        </ul>
      </div>
      <div class="col-6 col-md-3 justify-content-center">
        <ul class="menu-footer list-unstyled pt-5">
          <?php 
            foreach ($menu as $key => $value) { 
              if ($key > 5) {
          ?>
          <li class="mb-2"><a href="<?PHP echo route('cat&id='.$value['id'].'&text='.$value['title']); ?>" class="text-white"><strong><?php echo $value['title']; ?></strong></a></li>
          <?php } ?>
          <?php } ?>
        </ul>
      </div>
    </div>
<!--     <div class="row mb-3">
      <div class="col-md-12 text-center">
        <p class="text-white mb-0">สนใจลงโฆษณา</p>
        <p class="text-white mb-0">E-mail : <a href="mailto:appvariety.news@gmail.com" class="text-white">zappvariety.news@gmail.com</a></p>
        <p class="text-white mb-0">โทร. <a href="tel:0926594496" class="text-white">092-6594496</a>, <a href="tel:0918509186" class="text-white">091-8509186</a></p>
      </div>
    </div> -->
    <!-- <div class="row justify-content-md-center">
      <div class="col-md-12">
        <ul class="footer-link">
          <?php foreach ($menu as $key => $value) { ?>
          <li><a href="<?PHP echo route('cat&id='.$value['id']); ?>"><strong><?php echo $value['title']; ?></strong></a></li>
          <?php } ?>
        </ul>
      </div>
    </div> -->
  </div>
</section>


<div class="copyright-area">
  <div class="container">
    <div class="copyright-area-content">
      <p>
        <i class='bx bx-copyright'></i>
        Copyright
      </p>
    </div>
  </div>
</div>


<div class="go-top">
  <i class='bx bx-up-arrow-alt'></i>
</div>
<script src="https://zappvariety.com/html/assets/js/jquery.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/popper.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/bootstrap.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/jquery.meanmenu.js"></script>
<script src="https://zappvariety.com/html/assets/js/owl.carousel.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/jquery.magnific-popup.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/form-validator.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/contact-form-script.js"></script>
<script src="https://zappvariety.com/html/assets/js/wow.min.js"></script>
<script src="https://zappvariety.com/html/assets/js/main.js"></script>
</body>

</html>