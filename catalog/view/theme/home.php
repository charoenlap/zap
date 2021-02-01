<!-- ad -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert <?php /*alert-dismissible*/ ?> fade show" role="alert">
					<div class="row">
						<?php 
							foreach ($advertising_1 as $key => $value) { 
						?>
						<div class="col-md-6">
							<a href="<?php echo $value['link']; ?>" target="_blank"><img src="<?php echo MURL.$value['path']; ?>" class="w-100"></a>
						</div>
						<?php } ?>
						<?php 
							foreach ($advertising_2 as $key => $value) { 
						?>
						<div class="col-md-6">
							<a href="<?php echo $value['link']; ?>" target="_blank"><img src="<?php echo MURL.$value['path']; ?>" class="w-100"></a>
						</div>
						<?php } ?>
						<?php /*<!-- <div class="col-md-6">
							<a href="<?php echo $value['link']; ?>" target="_blank"><img src="html/assets/img/ad/AD Soap 2021_01.jpg" class="w-100"></a>
						</div> -->*/ ?>
					</div>
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
			</div>
		</div>
	</div>	
</section>

<section class="main-news-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title pt-4">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_1; ?></h2>
							
							<?php /*<a href="<?php echo route('cat&id=1'); ?>" class="text-decoration-none">

							</a>*/ ?>
						</div>
					</div>
				</div>
				<div class="business-news-slides owl-carousel owl-theme">
					<?php  
						foreach ($content_1 as $key => $val) {
					?>
					<div class="single-main-news">
						<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
							<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
						</a>
						<div class="news-content">
							<?php /*<!-- <?php if(isset($val['tags'])){ ?>
							<?php foreach($val['tags'] as $tag){?>
								<div class="tag bg-danger">
									<?php echo $tag['title']; ?>
								</div>
							<?php } ?>
							<?php } ?> -->
							<!-- <h3>
								<a href="<?php echo route('detail&id='.$val['result']['id'].'&cat='.$content_topic_1.'&text='.urlencode($val['result']['title'])); ?>">
									<?php echo $val['result']['title']; ?>
								</a>
							</h3>
							<span><?php echo $val['result']['date_create']; ?></span> -->*/ ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title pt-4">
							<a href="<?php echo route('cat&id=2&text='.$content_topic_2); ?>" class="text-decoration-none">
								<h2 class="font-weight-bold text-danger"><?php echo $content_topic_2; ?></h2>
							</a>
						</div>
					</div>
				</div>
				<?php //$val = $lasted[1]; ?>
				<?php  
					foreach ($content_one_2 as $key => $val) {
				?>
				<!-- <div class="single-main-news-inner"> -->
					<a href="<?php echo route('detail&id='.$val['result']['id'].'&cat='.$content_topic_2.'&text='.urlencode($val['result']['title'])); ?>">
						<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,610" alt="<?php echo $val['result']['title']; ?>">
					</a>
					<!-- <div class="news-content">
						<?php /*foreach($val['tags'] as $tag){?>
							<div class="tag bg-danger">
								<?php echo $tag['title']; ?>
							</div>
						<?php } ?> -->
						<!-- <h3>
							<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
								<?php echo $val['result']['title']; ?>
							</a>
						</h3>
						<span><?php echo $val['result']['date_create']; ?></span><?php */ ?>
					</div> -->
				<!-- </div> -->
				<?php } ?>
				<!-- <?php $val = $lasted[2]; ?> -->
				<?php  
					foreach ($content_limit2_2 as $key => $val) {
				?>
					<div class="row m-0">
						<div class="single-main-news-box media align-items-center w-100">
							<div class="col-md-5 col-lg-4 p-0">
								<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
									<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,420,260" alt="<?php echo $val['result']['title']; ?>">
								</a>
							</div>
							<div class="col-md-7 col-lg-8">
								<div class="news-content p-1">
									<h6>
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<?php echo $val['result']['title']; ?>
										</a>
									</h6>
									<span><?php echo $val['result']['date_create']; ?></span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php /*$val = $lasted[3]; ?>
				<div class="row m-0">
					<div class="single-main-news-box media align-items-center">
						<div class="col-md-4 p-0">
							<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
								<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,130,90" alt="<?php echo $val['result']['title']; ?>">
							</a>
						</div>
						<div class="col-md-8">
							<div class="news-content">
								<h6>
									<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
										<?php echo $val['result']['title']; ?>
									</a>
								</h6>
								<span><?php echo $val['result']['date_create']; ?></span>
							</div>
						</div>
					</div>
				</div><?php */ ?>
			</div>
		</div>
	</div>
</section>
<?php /* ?>
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
											<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
												<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">
											</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="news-content">
											<?php foreach($val['tags'] as $tag){?>
												<span class="badge badge-danger text-wrap text-light">
													<?php echo $tag['title']; ?>
												</span>
											<?php } ?>
											<h4>
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
	                <a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>" class="text-decoration-none">
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
<?php */ ?>
<?php if(count($content_3)){ ?>
<section class="main-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat&id=3'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_3; ?></h2>
						</a>
						
					</div>
					<div class="row">

						<?php foreach ($content_one_3 as $val_3) { } ?>
						<div class="col-lg-5">
							<div class="single-main-news">
								<a href="<?php echo route('detail&id='.$val_3['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
									<!-- <img src="img.php?file=2,<?php echo photo($val_3['cover']); ?>,1000,610" alt="<?php echo $val_3['result']['title']; ?>"> -->
									<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val_3['img_title']); ?>,1100,610" alt="<?php echo $val_3['result']['title']; ?>">
								</a>
								<?php /* ?><div class="news-content">
									<a href="<?php echo route('detail&id='.$val_3['result']['id']); ?>" class="text-white">
										<?php echo $val_3['result']['title']; ?>
									</a>
									<p class="text-white"><small><?php echo $val_3['result']['date_create']; ?></small></p>
								</div><?php */?>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="news-slides owl-carousel owl-theme">
								<?php  
									for($i=0;$i<count($content_3);$i+=2){
										$val = $content_3[$i];
								?>
								<div class="single-main-news">
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php 
									if(isset($content_3[$i+1])){
									$val = $content_3[$i+1]; ?>
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12 text-right">
							<a href="<?php echo route('cat&id=3&text='.$val['result']['title']); ?>" class="btn btn-primary">อ่านต่อ</a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<section class="default-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('video'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger">คลิปวิดีโอ</h2>
						</a>
					</div>
					<div class="row">
						<?php foreach ($related as $val) { ?>
						<div class="col-md-3 mb-3">
						    <a href="<?php echo route('video/video_detail&id='.$val['id'].'&text='.$val['result']['title']); ?>">
						        <div class="video-item">
						            <div class="video-news-image">
						                <i class='bx bx-play-circle'></i>
						            	<!-- <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $val['result']['link']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
						                <!-- <img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['cover']); ?>,300,200" alt="<?php echo $val['result']['title']; ?>"> -->
						                <img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,800,500" alt="<?php echo $val['result']['title']; ?>">
						            </div>
						            <?php /*<div class="video-news-content">
						                <h3>
						                    <?php echo $val['result']['title']; ?>
						                </h3>
						            </div>*/ ?>
						        </div>
						    </a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="default-news-area">
	<div class="container">
		<div class="row">
			<?php if(count($content_limit3_6)){ ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat&text='.$content_topic_6); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_6; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php 
						foreach($content_limit3_6 as $key => $val){ 
					?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
			<?php } ?>

			<?php if(count($content_limit3_7)) { ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat&text='.$content_topic_7); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_7; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_limit3_7 as $key => $val){ ?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
			<?php } ?>

			<?php if(count($content_limit3_4)) { ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat&text='.$content_topic_4); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_4; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_limit3_4 as $key => $val){ ?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
					<div class="row">
						<div class="col-md-12">
						<?php 
							foreach ($advertising_3 as $key => $value) { 
						?>
							<div class="alert alert-dismissible fade show" role="alert">
								<a href="<?php echo $value['link']; ?>"><img src="<?php echo MURL.$value['path']; ?>" class="w-100"></a>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

			<?php if(count($content_limit3_5)) { ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_5; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_limit3_5 as $key => $val){ ?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
			<?php } ?>

			<?php if(count($content_limit3_9)) { ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_9; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_limit3_9 as $key => $val){ ?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
			<?php } ?>
			<?php if(count($content_limit3_14)) { ?>
			<div class="col-lg-6">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_14; ?></h2>
						</a>
					</div>
					<div class="row">
					<?php foreach($content_limit3_14 as $key => $val){ ?>
						<div class="col-md-12">
							<a href="<?php echo route('detail'); ?>" class="text-decoration-none">
							<div class="most-popular-post border-0">
								<div class="single-news-item">
									<div class="row mb-3">
										<div class="col-6">
											<div class="news-image">
												<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
													<?php /*<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="image">*/ ?>
													<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,1100,600" alt="<?php echo $val['result']['title']; ?>">
												</a>
											</div>
										</div>
										<div class="col-6">
											<div class="news-content">
												<h4>
													<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
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
			<?php } ?>
		</div>
	</div>
</section>


<!-- /////////////////////// ไม่ได้ใช้ /////////////////////// -->
<?php foreach($menu as $val){ 
		eval('$loop = $content_'.$val['id'].';');
		if(count($loop)<0){
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
						<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
							<img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,290" alt="<?php echo $val['result']['title']; ?>">
						</a>
					</div>
					<div class="popular-news-content">
						<h3 class="font-weight-bold">
							<a href="<?php echo route('detail&id='.$val['id'].'&text='.$val['result']['title']); ?>"><?php echo $val['result']['title']; ?></a>
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
<!-- /////////////////////// ไม่ได้ใช้ /////////////////////// -->



<section class="main-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_10; ?></h2>
						</a>
					</div>
					<div class="row">
						<?php foreach ($content_one_10 as $key => $val_10) { } ?>
						<div class="col-lg-5">
							<div class="single-main-news">
								<a href="<?php echo route('detail&id='.$val_10['result']['id'].'&text='.$val_10['result']['title']); ?>">
									<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val_10['img_title']); ?>,1100,610" alt="<?php echo $val_10['result']['title']; ?>">
									<?php /*<img src="<?php echo photo($val_10['img_title']); ?>" class="w-100" alt="<?php echo $val_10['result']['title']; ?>">*/ ?>
								</a>
								<?php /*<div class="news-content">
									<a href="<?php echo route('detail&id='.$val_10['result']['id']); ?>" class="text-white">
										<?php echo $val_10['result']['title']; ?>
									</a>
									<p class="text-white"><small><?php echo $val_10['result']['date_create']; ?></small></p>
								</div>*/ ?>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="news-slides owl-carousel owl-theme">
								<?php  
									for($i=0;$i<count($content_10);$i+=2){
										$val = $content_10[$i];
								?>
								<div class="single-main-news">
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php 
									if(isset($content_10[$i+1])){
									$val = $content_10[$i+1]; ?>
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="main-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_13; ?></h2>
						</a>
					</div>
					<div class="row">
						<?php foreach ($content_one_13 as $val_13) { } ?>
						<div class="col-lg-5">
							<div class="single-main-news">
								<a href="<?php echo route('detail&id='.$val_13['result']['id'].'&text='.$val_13['result']['title']); ?>">
									<?php /*<img src="img.php?file=2,<?php echo photo($val_13['cover']); ?>,1000,610" alt="<?php echo $val_13['result']['title']; ?>">*/ ?>
									<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val_13['img_title']); ?>,1100,610" class="w-100" alt="<?php echo $val_13['result']['title']; ?>">
								</a>
								<?php /*<div class="news-content">
									<a href="<?php echo route('detail&id='.$val_13['result']['id']); ?>" class="text-white">
										<?php echo $val_13['result']['title']; ?>
									</a>
									<p class="text-white"><small><?php echo $val_13['result']['date_create']; ?></small></p>
								</div>*/ ?>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="news-slides owl-carousel owl-theme">
								<?php  
									for($i=0;$i<count($content_13);$i+=2){
										$val = $content_13[$i];
								?>
								<div class="single-main-news">
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php 
									if(isset($content_13[$i+1])){
									$val = $content_13[$i+1]; ?>
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="main-news-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="most-popular-news">
					<div class="section-title pt-4">
						<a href="<?php echo route('cat'); ?>" class="text-decoration-none">
							<h2 class="font-weight-bold text-danger"><?php echo $content_topic_12; ?></h2>
						</a>
					</div>
					<div class="row">
						<?php foreach ($content_one_12 as $val_12) { }?>
						<div class="col-lg-5">
							<div class="single-main-news">
								<a href="<?php echo route('detail&id='.$val_12['result']['id'].'&text='.$val_12['result']['title']); ?>">
									<?php /*<!-- <img src="img.php?file=2,<?php echo photo($val_12['cover']); ?>,1000,610" alt="<?php echo $val_12['result']['title']; ?>"> -->*/ ?>
									<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val_12['img_title']); ?>,1100,610" class="w-100" alt="<?php echo $val_12['result']['title']; ?>">
								</a>
								<?php /*<div class="news-content">
									<a href="<?php echo route('detail&id='.$val_12['result']['id']); ?>" class="text-white">
										<?php echo $val_12['result']['title']; ?>
									</a>
									<p class="text-white"><small><?php echo $val_12['result']['date_create']; ?></small></p>
								</div>*/ ?>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="news-slides owl-carousel owl-theme">
								<?php  
									for($i=0;$i<count($content_12);$i+=2){
										$val = $content_12[$i];
								?>
								<div class="single-main-news">
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php 
									if(isset($content_12[$i+1])){
									$val = $content_12[$i+1]; ?>
									<div class="single-main-news-inner">
										<a href="<?php echo route('detail&id='.$val['result']['id'].'&text='.urlencode($val['result']['title'])); ?>">
											<!-- <img src="img.php?file=2,<?php echo photo($val['cover']); ?>,400,265" alt="<?php echo $val['result']['title']; ?>"> -->
											<img src="<?php echo MURL; ?>img.php?file=2,<?php echo photo($val['img_title']); ?>,450,250" alt="<?php echo $val['result']['title']; ?>">
										</a>
									</div>	
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>