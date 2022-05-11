<!doctype html>
<html>
<head>
<title>Profile – <?=$site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="profile">
	<!-- <div class="fixedBtn">
        <button type="button" id="availBtn" class="webBtn"><i class="fi-calendar"></i></button>
        <button type="button" id="proBtn" class="webBtn colorBtn"><i class="fi-check"></i> Hire <?= $row->mem_fname?></button>
    </div> -->
	<div class="contain">
		<div class="flexRow flex">
			<div class="col col1">
				<ul id="gallery" class="flex">
					<?php foreach ($characters as $key => $char): ?>
						<li>
							<div class="image popBtn" character><img src="<?= get_image_src($char->main_image, 400); ?>" alt=""><strong><?= $char->title?></strong><span>View All</span></div>
						</li>
					<?php endforeach ?>
				</ul>
				<div class="popup big-popup" data-popup="gallery">
					<div class="tableDv">
						<div class="tableCell">
							<div class="contain">
								<div class="_inner">
									<div class="crosBtn"></div>
									<h2>Movies Characters</h2>
									<!-- <ul class="gallery flex">
										<li data-src="<?= base_url('assets/images/lara-croft-tomb-raider.jpg')?>">
											<div class="image"><img src="<?= base_url('assets/images/lara-croft-tomb-raider.jpg')?>" alt=""></div>
										</li>
									</ul> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="miniSlider">
					<ul id="lightSlider" class="relative">
		                <li data-src="<?= base_url('assets/images/wallhaven-k9g61q.jpg')?>" data-thumb="<?= base_url('assets/images/wallhaven-k9g61q.jpg')?>">
		                    <img src="<?= base_url('assets/images/wallhaven-k9g61q.jpg')?>" alt="">
		                </li>
		                <li data-src="<?= base_url('assets/images/news-item04.jpg')?>" data-thumb="<?= base_url('assets/images/news-item04.jpg')?>">
		                    <img src="<?= base_url('assets/images/news-item04.jpg')?>" alt="">
		                </li>
		                <li data-src="<?= base_url('assets/images/news-item02.jpg')?>" data-thumb="<?= base_url('assets/images/news-item02.jpg')?>">
		                    <img src="<?= base_url('assets/images/news-item02.jpg')?>" alt="">
		                </li>
		                <li data-src="<?= base_url('assets/images/news-item01.jpg')?>" data-thumb="<?= base_url('assets/images/news-item01.jpg')?>">
		                    <img src="<?= base_url('assets/images/news-item01.jpg')?>" alt="">
		                </li>
		                <li data-src="<?= base_url('assets/images/news-item03.jpg')?>" data-thumb="<?= base_url('assets/images/news-item03.jpg')?>">
		                    <img src="<?= base_url('assets/images/news-item03.jpg')?>" alt="">
		                </li>
		            </ul>
	            </div> -->
	            <div id="descrip">
		            <div class="client">
		            	<h3>About Jennifer</h3>
		            	<?= $row->mem_about?>
						<hr>
						<h3>Characters</h3>
						<ul class="sizeLst text-center">
							<?php foreach ($characters as $key => $char): ?>
								<li>
									<img src="<?=  get_site_image_src("characters/", $char->image); ?>" alt="">
									<?= $char->title?>
								</li>
							<?php endforeach ?>
		            	</ul>
						<!-- <hr>
						<h5>Additional Skills</h5>
						<ul class="_list flex">
		            		<li>Major Event Experience</li>
		            		<li>Can provide extra time</li>
						</ul>
						<h5>Stats</h5>
						<ul class="_list flex">
		            		<li>&lt;1h Response time</li>
		            		<li>100% Response rate</li>
		            		<li>SMS <em class="miniLbl green">Verified</em></li>
		            		<li>Email <em class="miniLbl green">Verified</em></li>
						</ul>
						<h5>Jennifer's Preferences</h5>
						<ul class="_list flex">
		            		<li>Music Events Allowed</li>
							<li>No Face plush</li>
							<li>Sang Alongside Me</li>
		            	</ul> -->
		            </div>
		            <hr>
		            <div class="reviews">
	                    <div class="head">
	                        <h3><?= $review_count?> Reviews</h3>
	                        <div class="rateYo" data-rateyo-rating="<?= $avg_mem_rating?>" data-rateyo-read-only="true"></div>
	                    </div>
	                    <?php foreach ($mem_reviews as $review_row): ?>
                            <div class="review">
                            	<div class="icoBlk">
                            		<div class="ico"><img src="<?= get_image_src($review_row->mem_image,150,true)?>" alt=""></div>
                            	</div>
                            	<div class="txt">
                            		<div class="icoTxt">
                            			<div class="title">
                            				<h4><?= $review_row->mem_name?></h4>
                            				<div class="date"><?= format_date($review_row->date)?></div>
                            			</div>
                            			<div class="rateYo" data-rateyo-rating="<?= $review_row->rating?>" data-rateyo-read-only="true"></div>
                            		</div>
                            		<p><?= $review_row->comment?></p>
                            		<?php if ($reply= get_reply($review_row->id)): ?>
                            			<div class="subReview">
                            				<div class="ico"><img src="<?= get_image_src($reply->mem_image, 150, true)?>" alt=""></div>
                            				<div class="subBlk">
                            					<h5><?= $reply->mem_name?>'s Response</h5>
                            					<p><?= $reply->comment?></p>
                            				</div>
                            			</div>
                            		<?php endif ?>
                            	</div>
                            </div>
                        <?php endforeach ?>
					</div>
	            </div>
                <!-- <div class="location">
	                <div id="mapBlk">
                        <div id="map_canvas"></div>
                    </div>
                </div> -->
			</div>
			<div class="col col2">
				<div class="proBlk">
					<div class="srchItm">
						<div class="icoBlk">
							<div class="ico"><img src="<?= get_image_src($row->mem_image, '150', true)?>" alt="<?= format_name($row->mem_fname, $row->mem_lname)?>" title="<?= format_name($row->mem_fname, $row->mem_lname)?>"></div>
							<div class="rateBlk">
		                        <div class="rating"><div class="rateYo" data-rateyo-rating="<?= $avg_mem_rating?>" data-rateyo-read-only="true"></div><span><?= $review_count?></span></div>
		                    </div>
						</div>
						<div class="txt">
							<h2><?= format_name($row->mem_fname, $row->mem_lname)?></h2>
							<div class="slogan"><?= $row->mem_profile_heading?></div>
							<div class="locate"><?= $row->mem_city?>, <?= $row->mem_zip?>, <?= get_country_name($row->mem_country_id)?></div>
							<?php if ($this->session->mem_type!='player'): ?>
								<?= favorite_btn($row->mem_id, 'player')?>
							<?php endif ?>
						</div>
					</div>
					<div class="btmBlk text-center">
						<!-- <hr> -->
						<div class="bTn">
							<!-- <a href="javascript:void(0)" class="webBtn colorBtn popBtn" data-popup="contact-me">Contact Me</a> -->
							<a href="<?= site_url('messages/'.$encoded_id)?>" class="webBtn colorBtn">Contact Me</a>
						</div>
					</div>
				</div>
				<!-- 
				<div class="smTxt text-center">
					<h5>Cancellation policy: Flexible</h5>
					<p class="small">Full refund if cancelled before noon one day before the booking, 50% refund afterwards</p>
				</div>
				-->
			</div>
		</div>
	</div>
	<div class="popup small-popup" data-popup="contact-me">
        <div class="tableDv">
            <div class="tableCell">
                <div class="contain">
                    <div class="_inner">
                        <div class="crosBtn"></div>
                        <h2>Contact me</h2>
                        <form action="" method="post">
        		            <div class="formRow row">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
		        		            <textarea name="" id="" class="txtBox" placeholder="Write something here"></textarea>
				                </div>
				            </div>
        		            <div class="bTn">
        		                <button type="submit" class="webBtn colorBtn">Send</button>
        		            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!-- profile -->


<!-- Google Map Api -->
<script type="text/javascript">
    $(function(){
    	let $characters = <?= json_encode($characters)?>;
    	$(document).on('click', '[character]', function(){
			let gallery = $characters[$('[character]').index(this)];
			let $images = `<ul class="gallery flex">`;
			$.each(gallery.images, function(i, img) {
				$images += `<li data-src="${base_url +'v/vp/'+img.image}">
				<div class="image"><img src="${base_url +'v/p300x300/'+img.image}" alt=""></div>
				</li>`;
			})
			$images += `</ul>`;
			$('ul.gallery').remove();
			$('body').addClass('flow');
			$('.popup[data-popup="gallery"]').fadeIn().find('h2').text(gallery.title).after($images);
			// $('.popup[data-popup="gallery"]').fadeIn().find('h2').text(gallery.title).end().find('ul.gallery').html($images);

			$('.gallery').lightGallery({
				thumbnail: true,
			});
        });

        /*$(document).on('click', '.selectLst > li > .lnk', function() {
            var radio = $(this).data('radio');
            // $(this).parents('.selectLst').find('.lnk').removeClass('active');
            $(this).toggleClass('active');
            $(this).parents('.frmGrp').children('input[type="hidden"]').val(radio);
        });
        $(document).on('click', '#profile form button.txtBox', function(){
			var days = $(this).attr('data-days');
            $(this).parents('form').find('div[data-days]').removeClass('active');
            $(this).parents('form').find('button[data-days]').removeClass('active');
            $(this).parents('form').find(this).addClass('active');
            $(this).parents('form').find('div[data-days = ' + days + ']').addClass('active');
        });*/
		$(document).on('click', '#profile #proBtn', function(){
            $('#profile #proSide').fadeIn();
            $('body').addClass('flow');
        });
		$(document).on('click', '#profile #availBtn', function(){
            $('#profile #availblty').fadeIn();
            $('body').addClass('flow');
        });
		$(document).on('click', '#profile #proSide > .crosBtn, #profile #availblty > .crosBtn', function(){
            $('#profile #proSide').fadeOut();
            $('#profile #availblty').fadeOut();
            $('body').removeClass('flow');
        });
    });
    /*function initMap() {
    	let myLatLng = {lat: 33.9139599, lng: -84.2968273};
    	let image = {
	        url: base_url + "assets/images/map-marker.png", // url
	        scaledSize: new google.maps.Size(60, 60), // scaled size
	        origin: new google.maps.Point(0, 0), // origin
	        anchor: new google.maps.Point(25, 50) // anchor
	    };

    	let map = new google.maps.Map(document.getElementById('map_canvas'), {
    		center: myLatLng,
    		zoom: 16,
    		styles: grayStyles
    	});

    	let marker = new google.maps.Marker({
    		position: myLatLng,
    		map: map,
    		icon: image,
    		title: '<?= format_name($row->mem_fname,$row->mem_lname)?>'
    	});
    }*/
</script>
<!-- <script type="text/javascript" src="<?= base_url('assets/js/map.api.js')?>"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&callback=initMap&libraries=geometry,places&ext=.js"></script> -->
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>