<section class="main-news-area">
	<div class="container">
		<div class="row">
			<?php $val = $lasted[0]; ?>
			<div class="col-lg-8">
				<div class="single-main-news">
					<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
						<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,1000,610" alt="<?php echo $val['result']['title']; ?>">
					</a>
					<div class="news-content">
						<?php if(isset($val['tags'])){ ?>
						<?php foreach($val['tags'] as $tag){?>
							<div class="tag bg-danger">
								<?php echo $tag['title']; ?>
							</div>
						<?php } ?>
						<?php } ?>
						<h3>
							<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
								<?php echo $val['result']['title']; ?>
							</a>
						</h3>
						<span><?php echo $val['result']['date_create']; ?></span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php $val = $lasted[1]; ?>
				<div class="single-main-news-inner">
					<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
						<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,250" alt="<?php echo $val['result']['title']; ?>">
					</a>
					<div class="news-content">
						<?php foreach($val['tags'] as $tag){?>
							<div class="tag bg-danger">
								<?php echo $tag['title']; ?>
							</div>
						<?php } ?>
						<h3>
							<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
								<?php echo $val['result']['title']; ?>
							</a>
						</h3>
						<span><?php echo $val['result']['date_create']; ?></span>
					</div>
				</div>
				<?php $val = $lasted[2]; ?>
				<div class="row m-0">
					<div class="single-main-news-box media align-items-center">
						<div class="col-md-4 p-0">
							<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
								<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,130,90" alt="<?php echo $val['result']['title']; ?>">
							</a>
						</div>
						<div class="col-md-8">
							<div class="news-content">
								<h6>
									<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
										<?php echo $val['result']['title']; ?>
									</a>
								</h6>
								<span><?php echo $val['result']['date_create']; ?></span>
							</div>
						</div>
					</div>
				</div>
				<?php $val = $lasted[3]; ?>
				<div class="row m-0">
					<div class="single-main-news-box media align-items-center">
						<div class="col-md-4 p-0">
							<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
								<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,130,90" alt="<?php echo $val['result']['title']; ?>">
							</a>
						</div>
						<div class="col-md-8">
							<div class="news-content">
								<h6>
									<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
										<?php echo $val['result']['title']; ?>
									</a>
								</h6>
								<span><?php echo $val['result']['date_create']; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if(count($content_1)){ ?>
<section class="default-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_1; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_1 as $val){ ?>
						<div class="col-md-4">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
						<div class="most-popular-post border-0">
							<div class="single-news-item">
								<div class="row mb-3">
									<div class="col-12">
										<div class="news-image">
											<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
												<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">
											</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="news-content">
											<!-- <?php foreach($val['tags'] as $tag){?>
												<span class="badge badge-danger text-wrap text-light">
													<?php echo $tag['title']; ?>
												</span>
											<?php } ?> -->
											<h4>
												<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
													<?php echo $val['result']['title']; ?>
												</a>
											</h4>
											<p><?php echo mb_strimwidth(strip_tags(html_entity_decode($val['result']['detail'])), 0, 50, "..."); ?></p>
											<p><?php echo $val['result']['date_create'];?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
						</div>	
					<?php } ?>
					</div>
				</div>
			</div>

				<div class="col-md-3 pl-3 pt-4">
					<div class="section-title">
						<h2 class="font-weight-bold text-danger">คลิปข่าวล่าสุด</h2>
					</div>
					<?php foreach($related as $val){ ?>
	                <a href="<?php echo route('detail&id='.$val['result']['id']); ?>" class="text-decoration-none">
	                    <div class="single-most-popular-news">
	                        <div class="popular-news-image">
	                            <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="<?php echo $val['result']['title']; ?>">
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
		</div>
	</div>
</section>
<?php } ?>
<?php foreach($menu as $val){ 
		eval('$loop = $content_'.$val['id'].';');
		if(count($loop)>0){
?>
<section class="main-hot-news">
	<div class="page-title-area mb-5">
		<div class="container">
			<div class="page-title-content text-center">
				<h2 class="font-weight-bold">
					<a href="<?php echo route('cat&id='.$val['id']); ?>" class="text-danger">
						<?php  eval('echo $content_topic_'.$val['id'].';'); ?> </a>
				</h2>
					
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach( $loop as $val){ ?>
			<div class="col-md-4">
				<div class="single-most-popular-news">
					<div class="popular-news-image">
						<a href="<?php echo route('detail&id='.$val['result']['id']); ?>">
							<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="<?php echo $val['result']['title']; ?>">
						</a>
					</div>
					<div class="popular-news-content">
						<h3 class="font-weight-bold">
							<a href="<?php echo route('detail&id='.$val['id']); ?>"><?php echo $val['result']['title']; ?></a>
						</h3>
						<h6>
							<?php //echo html_entity_decode($val['result']['detail']); ?>
							<?php echo mb_strimwidth(strip_tags(html_entity_decode($val['result']['detail'])), 0, 50, "..."); ?>
						</h6>
					</div>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
</section>
<?php } ?>
<?php } ?>

<?php /*<section class="default-news-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="single-new-news-box">
					<div class="new-news-image">
						<a href="#">
							<img src="html/assets/img/new-news/new-news-3.jpg" alt="image">
						</a>
						<div class="new-news-content ">
							<span class="bg-danger">ข่าวหน้า1</span>
							<h3>
								<a href="#">ด่วน! ผอ.รพ.พระจอมเกล้า ถูกคนร้าย ปลอมตัวเป็นคนไข้ จ่อยิงดับ คาคลินิก</a>
							</h3>
							<h6>นายแพทย์ชุมพล ผอ.รพ.พระจอมเกล้า จ.เพชรบุรี ถูกคนร้าย ปลอมตัวเป็นคนไข้ มาจ่อยิง ดับคาคลีนิกตัวเอง</h6>
							<p>21 ธันวาคม พ.ศ. 2563 | เวลา 12:12 น.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="single-new-news-box">
					<div class="new-news-image">
						<a href="#">
							<img src="html/assets/img/new-news/new-news-3.jpg" alt="image">
						</a>
						<div class="new-news-content ">
							<span class="bg-danger">ข่าวหน้า1</span>
							<h3>
								<a href="#">ด่วน! ผอ.รพ.พระจอมเกล้า ถูกคนร้าย ปลอมตัวเป็นคนไข้ จ่อยิงดับ คาคลินิก</a>
							</h3>
							<h6>นายแพทย์ชุมพล ผอ.รพ.พระจอมเกล้า จ.เพชรบุรี ถูกคนร้าย ปลอมตัวเป็นคนไข้ มาจ่อยิง ดับคาคลีนิกตัวเอง</h6>
							<p>21 ธันวาคม พ.ศ. 2563 | เวลา 12:12 น.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="container-fluid">
		<div class="row justify-content-center">
			<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
				<div class="single-business-news">
					<div class="business-news-image">
						<img src="html/assets/img/business-news/business-news-1.jpg" alt="image">
					</div>
					<div class="business-news-content">
						<h3 class="font-weight-bold">
							ด่วน! ผอ.รพ.พระจอมเกล้า ถูกคนร้าย ปลอมตัวเป็นคนไข้ จ่อยิงดับ คาคลินิก
						</h3>
						<h6>นายแพทย์ชุมพล ผอ.รพ.พระจอมเกล้า จ.เพชรบุรี ถูกคนร้าย ปลอมตัวเป็นคนไข้ มาจ่อยิง ดับคาคลีนิกตัวเอง</h6>
						<p>21 ธันวาคม พ.ศ. 2563 | เวลา 12:12 น.</p>
					</div>
				</div>
			</a>
		</div>
	</div> -->
</section>*/ ?>