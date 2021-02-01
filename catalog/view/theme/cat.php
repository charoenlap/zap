<section class="default-news-area">
	<div class="page-title-area mb-5">
		<?php if ($data['adcat']['path']) { ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="alert fade show" role="alert">
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo $data['adcat']['link']; ?>" target="_blank">
									<img src="<?php echo MURL; ?><?php echo $data['adcat']['path']; ?>" class="w-100" "></a>
							</div>
						</div>
						<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button> -->
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="container">
			<div class="page-title-content text-center">
				<h2 class="font-weight-bold text-danger"><?php echo $topic; ?></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="most-popular-news">
					<?php foreach($cat as $val){ 
						// var_dump($val);exit();
						?>
					<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
						<div class="most-popular-post border-0">
							<div class="single-news-item">
								<div class="row align-items-center">
									<div class="col-lg-6">
										<div class="news-image">
											<a href="<?php echo route('detail&id='.$val['id'].'&text='.$val['result']['title']); ?>">
												<!-- <img src="img.php?file=2,<?php echo $val['cover']; ?>,450,200" alt="image"> -->
												<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1920,1080" class="w-100">
											</a>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="news-content">
											<?php foreach($val['tags'] as $tag){?>
												<span class="badge badge-danger text-wrap text-light">
													<?php echo $tag['title']; ?>
												</span>
											<?php } ?>
											<h3>
												<a href="<?php echo route('detail&id='.$val['id'].'&text='.$val['result']['title']); ?>">
													<?php echo $val['result']['title']; ?>
												</a>
											</h3>
											<p><?php echo mb_strimwidth(strip_tags(html_entity_decode($val['result']['detail'])), 0, 50, "..."); ?></p>
											<p><?php echo $val['result']['date_create']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<hr>
					<?php } ?>
					<?php /* ?>
					<div class="pagination-area text-center m-5">
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
					</div>
					<?php */?>
				</div>
			</div>


			<div class="col-md-3">
				<div class="section-title">
					<h2 class="font-weight-bold text-danger">คลิปข่าวล่าสุด</h2>
				</div>
				<?php foreach($vdo as $val){ ?>
				<a href="<?php echo route('video/video_detail&id='.$val['id'].'&text='.$val['result']['title']); ?>" class="text-decoration-none">
					<div class="single-most-popular-news">
						<div class="popular-news-image">
							<!-- <img src="img.php?file=2,<?php echo $val['cover']; ?>,290,130" alt="image"> -->
							<!-- <img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['cover']); ?>,450,260"> -->
							<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,260">
						</div>
						<div class="popular-news-content">
							<span class="font-weight-bold">
								<?php echo mb_strimwidth(strip_tags(html_entity_decode($val['result']['detail'])), 0, 50, "..."); ?>
							</span>
						</div>
					</div>
				</a>
				<hr>
				<?php } ?>
				<a href="<?php echo route('video'); ?>" class="text-decoration-none">
					<h5 class="text-right text-danger font-weight-bold">คลิปทั้งหมด</h5>
				</a>
			</div>
		</div>
	</div>
	</div>
</section>
<!-- <section class="main-hot-news">
	<h2 class="font-weight-bold text-center text-danger" style="margin-top: 20px;">ข่าวหน้า 1</h2>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="single-most-popular-news">
					<div class="popular-news-image">
						<a href="">
							<img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
						</a>
					</div>
					<div class="popular-news-content">
						<h5 class="font-weight-bold">สุดดีใจ! นาทีชีวิต สาวถูกสามีเก่าฉุด เผย ไม่คิดว่าจะได้กลับมา</h5>
						<h6>
							ปลอดภัยแล้ว! นาทีชีวิต สาวถูกสามีเก่าฉุด เผย ไม่คิดว่าจะได้กลับมา หลังถูกลักพาตัว นาน 6 วัน
						</h6>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="single-most-popular-news">
					<div class="popular-news-image">
						<a href="#">
							<img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
						</a>
					</div>
					<div class="popular-news-content">
						<h5 class="font-weight-bold">สาธารณสุข ตั้งปม หาเหตุแห่ง การแพร่ระบาด โควิด ใน สมุทรสาคร</h5>
						<h6>
							สาธารณสุข ตั้งปมเหตุ การแพร่ระบาด โควิด สมุทรสาคร
						</h6>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="single-most-popular-news">
					<div class="popular-news-image">
						<a href="#">
							<img src="html/assets/img/most-popular/most-popular-1.jpg" alt="image">
						</a>
					</div>
					<div class="popular-news-content">
						<h5 class="font-weight-bold">เปิดไทม์ไลน์ หญิงวัย 33 แม่ค้าอาหารทะเล ตลาดนวลจันทร์ ติดโควิด</h5>
						<h6>
							ไล่ไทม์ไลน์ แม่ค้าอาหารทะเลตลาดนวลจันทร์ ติดโควิด 19
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
</section> -->