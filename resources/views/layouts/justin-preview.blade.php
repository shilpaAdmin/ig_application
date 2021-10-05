<section class="row">
 <!-- Preview Starts -->
<div class="col-md-6">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title d-inline-flex">Story Preview</h4>
			<span class="d-inline-flex float-right mb-3" style="display:inline-flex">
				<span class="badge badge-lg rounded-pill badge-soft-primary" style="font-size:12px" href="javascript:;" onclick="showStoryTypePopup()">
					<span id="selectedStoryTypepreview">
					</span>
				</span>
			</span>
			<h4 class="card-title d-inline-flex"></h4>
		 <!-- Top News/Detail Start-->
		 <div id="top_news_preview_div_id" style="display:none;">
			<div class="big_news_img" id="dummyDetailImageOrVideo">
				<img src="../../../assets/images/modi_with_amit.jpg">
			</div>
			<video class="video-iframe" width="100%" height="50%" controls id="userDetailVideoId" style="display:none;">
				<source src="" type="video/mp4">
				Your browser does not support HTML video.
			</video>
			<div class="big_news_img" id="userDetailImageOrVideo" style="display:none;">
				<img src="">
			</div>
			<div class="content_card">
				<h5 class="slugTitleBigNewsFeed" id="userDetailSlug" style="text-transform:uppercase;">Just in</h5>
				<h1 class="timeLineHeadingBigNewsFeed" id="userDetailTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>

				<ul class="dummyStoryPointsUl" id="dummyDetailDescriptionPoints">
					<li class="text_mono">Aircraft was flying in from dubai to calicut</li>
					<li class="text_mono">Fire tender and ambulance rushed to the spot more details awaited</li>
					<li class="text_mono">Crashes after overshooting the runaway and going into the vally</li>
				</ul>
				<ul class="userStoryPointsUl" id="userDetailDescriptionPoints" style="display:none;">
				</ul>
				<div class="publish_time">
					<h5 style="margin-bottom:10px;">3 minutes ago</h5>
				</div>
			</div>
		</div>
		<!-- Top News/Detail End-->
		<!-- News Update/Quick -->
		<div id="news_update_preview_div_id" class="pt-2 pb-2" style="display:none; border-bottom:1px solid #d5d5d5;">
			<h3 class="timeLineHeadingBigNewsFeed" id="userNewsUpdateTitle" style="font-weight:900; padding:0.75rem;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h3>
			<div class="col-md-8">
				<span class="slugTitleBigNewsFeed" id="userNewsUpdateDate">Date: 31-10-2020</span>
			</div>
			<ul class="dummyStoryPointsUl" id="dummyNewsUpdateDescriptionPoints">
				<li><span class="text_mono">Aircraft was fllying in from dubai to calicut</span></li>
				<li><span class="text_mono">Fire tender and ambulance rushed to the spot more details awaited</span></li>
				<li><span class="text_mono">Crashes after overshooting the runaway and going into the vally</span></li>
			</ul>
			<ul class="userStoryPointsUl" id="userNewsUpdateDescriptionPoints" style="display:none;">
			</ul>
			<small> 3 minutes ago</small>
		</div>
		<div id="justin_preview_div_id" style="display:none;">
			<div class="col-12">
				<div class="card singlefeed">
					<div class="card-body">
						<div class="content_card video_content title">
							<h3 class="slugVideoFeed" id="userJustinSlugId">Top News</h3>
						</div>
						<div class="slider-frame">
							<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
								<div class="" role="listbox" id="userJustinSlideshow">
									<div class="carousel-item active">
										<h5 class="timeLineHeadingPhotoFeed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</h5>
									</div>
									<div class="carousel-item">
										<h5 class="timeLineHeadingPhotoFeed">Fire tender and ambulance rushed to the spot more details awaited</h5>
									</div>
									<div class="carousel-item">
										<h5 class="timeLineHeadingPhotoFeed">Crashes after overshooting the runaway and going into the vally</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="social_media_preview_div_id" style="display:none;">
			<!-- Text Only/Short -->
			<div>
				<h4 class="timeLineHeadingBigNewsFeed" id="userSocialMediaSlug" style="font-weight:900; background-color:#e3e0e0; padding:10px;">74 independance day </h4>
				<div>
					<h3 class="timeLineHeadingBigNewsFeed" id="useSocialMediaTitle" style="font-weight:900; padding:0.75rem;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h3>

					<p id="userSocialMediaDescription" class="text_mono" style="padding:10px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<small style="padding:10px;"> 3 minutes ago</small>
				</div>

			</div>
		</div>
		<div id="text_with_header_preview_div_id" style="display:none;">
			<div>
				<h4 class="timeLineHeadingBigNewsFeed" id="userTextWithHeaderSlug" style="font-weight:900; background-color:#e3e0e0; padding:10px;">74 independance day </h4>
				<div>

					<p id="userTextWithHeaderDescription" style="padding:10px;" class="text_mono"><strong>Newsfirst</strong>: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<small style="padding:10px;"> 3 minutes ago</small>
				</div>

			</div>
		</div>
		<!-- Video Feed -->
		<div id="video_header_videoline_preview_div_id" style="display:none;">
			<div class="col-12">
				<div class="card singlefeed">
					<div class="card-body">
						<div class="content_card video_content title">
							<h3 class="slugVideoFeed" id="userVideoSlugId">Top News</h3>
						</div>
						<img src="{{URL::asset('/images/loading.gif')}}" id="videoDisplayLoaderDivId" style="display:none; height: 50px;
width: 90px; z-index: 1;  position: absolute; margin-top: -27px; margin-left: 0px;" />
						<video class="video-iframe" width="100%" controls id="dummyVideoFileVideoId">
							<source id="dummyVideoFileSourceId" src="../../../assets/images/demo.mp4" type="video/mp4">
							Your browser does not support HTML video.
						</video>
						<video class="video-iframe" width="100%" controls id="userVideoFileVideoId" style="display:none;">
							<source src="" type="video/mp4">
							Your browser does not support HTML video.
						</video>
						<div class="content_card video_content">
							<h3 class="timeLineHeadingVideoFeed" id="userVideoTitleId">lorem ipsum is simply dummy text of the printing typesetting industry.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="photo_header_photoline_preview_div_id" style="display:none;">
			<div class="content_card video_content title">
				<h3 class="slugVideoFeed" id="userPhotoHeaderPhotolineSlug">Top News</h3>
			</div>
			<div class="big_news_img" id="dummyPhotoHeaderPhotolineImage">
				<img src="../../../assets/images/modi_with_amit.jpg">
			</div>
			<div class="big_news_img" id="userPhotoHeaderPhotolineImage" style="display:none;">
				<img src="">
			</div>
			<div class="content_card">
				<h1 class="timeLineHeadingBigNewsFeed" id="userPhotoHeaderPhotolineTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>
			</div>
		</div>
		<div id="photo_photoline_preview_div_id" style="display:none;">
			<div class="big_news_img" id="dummyPhotoPhotolineImage">
				<img src="../../../assets/images/modi_with_amit.jpg">
			</div>
			<div class="big_news_img" id="userPhotoPhotolineImage" style="display:none;">
				<img src="">
			</div>
			<div class="content_card">
				<h1 class="timeLineHeadingBigNewsFeed" id="userPhotoPhotolineTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>
			</div>
		</div>
		<div id="photo_album_preview_div_id" style="display:none;">
			<div class="col-12">
				<div class="card singlefeed">
					<div class="card-body">
						<div class="content_card video_content title">
							<h3 class="slugPhotoFeed" id="photoAlbumSlugId">Politics</h3>
						</div>
						<div class="slider-frame">
							<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
								<div class="" role="listbox" id="userMultipleImagesDivId">
									<div class="carousel-item active">
										<img class="d-block img-fluid" src="../../../assets/images/banner1.jpg" alt="First slide">
										<div class="slider_num_of">
											1/2
										</div>
										<h5 class="timeLineHeadingPhotoFeed">It has Survived not only five centuries, but also the leap into electronic typesetting.</h5>
									</div>
									<div class="carousel-item">
										<img class="d-block img-fluid" src="../../../assets/images/banner2.jpg" alt="Second slide">
										<div class="slider_num_of">
											2/2
										</div>
										<h5 class="timeLineHeadingPhotoFeed">It has Survived not only five centuries, but also the leap into electronic typesetting.</h5>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="thread_preview_div_id" style="display:none;">
			<h4 class="timeLineHeadingBigNewsFeed" id="userThreadSlug" style="font-weight:900; background-color:#e3e0e0; padding:10px;">74 independance day </h4>
			<div class="big_news_img" id="dummyThreadImageOrVideo">
				<img src="../../../assets/images/modi_with_amit.jpg">
			</div>
			<video class="video-iframe" width="100%" height="50%" controls id="userThreadVideoId" style="display:none;">
				<source src="" type="video/mp4">
				Your browser does not support HTML video.
			</video>
			<div class="big_news_img" id="userThreadImageOrVideo" style="display:none;">
				<img src="">
			</div>
			<div class="content_card">
				<h1 class="timeLineHeadingBigNewsFeed" id="userThreadTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>
				<br/>
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<span class="slugTitleBigNewsFeed" id="userThreadDate">Date: 31-10-2020</span>
						</div>

						<div class="col-md-2">
							<img src="../../../assets/images/upload.png" style="width:19px;">
						</div>

						<div class="col-md-2">
							<img src="../../../assets/images/plus.png" style="width:19px;" id="accordion" alt="" srcset="">
						</div>

					</div>
				</div>

				<div class="news_action">
					<ul class="dummyStoryPointsUl" id="dummyThreadDescriptionPoints">
						<li class="text_mono"><strong>10:30 AM : </strong>Aircraft was fllying in from dubai to calicut</li>
						<li class="text_mono"><strong>10:45 AM : </strong>Fire tender and ambulance rushed to the spot more details awaited</li>
						<li class="text_mono"><strong>11:30 AM : </strong>Crashes after overshooting the runaway and going into the vally</li>
					</ul>
				</div>

				<ul class="userStoryPoi ntsUl" id="userThreadDescriptionPoints" style="display:none;">
				</ul>
			</div>
		</div>

		<div id="emoji_and_text_preview_div_id" style="display:none;">
			<h4 class="timeLineHeadingBigNewsFeed" id="userEmojiAndTextSlug" style="font-weight:900; background-color:#e3e0e0; padding:10px;">Emoji and Text screen </h4>
			<div class="content_card">
				<div class="row">
					<div class="col-md-8">
						<p id="userEmojiAndTextDescription" class="text_mono">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>

					</div>

					<div class="col-md-4">
						<span style='font-size:60px;' id="userEmojiAndTextEmojiHtml">&#128512;</span>
					</div>
				</div>
				<br/>
			</div>
		</div>
		<div id="audio_preview_div_id" style="display:none;">
			<div class="action_covid">
				<div style="display:flex;">
					<img src="../../../assets/images/mic.png" alt="" srcset="" style="width:20px; margin:auto 5px;">
					<h5 class="main_heading slugAudioFeed" id="slugAudioFeed">interview with Mr.Vijay Rupani</h5>
				</div>

				<div class="share_icon">
					<img src="../../../assets/images/upload.png" style="width:20px;">
				</div>
			</div>
			<div class="coorona_deses mb-3">
				<p class="timeLineHeadingAudioFeed text_mono" id="timeLineHeadingAudioFeed">Coronavirus are a group of related RNA viruses the causes disease in mamamals and birds humans these viruses cause respiratory tract infections a that can range from mild to lethal.Coronaviruses are a Group of related RNA Viruses</p>

				<img id="dummyAudioImageId" src="../../../assets/images/rupani.jpg" class="rounded_image" alt="" srcset="">
				<img src="" class="rounded_image" id="userAudioImageId" alt="" srcset="" style="display:none;">

				<section class="styleit">
					<audio controls="" id="dummyAudioFileAudioId">
						<source src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9473/new_year_dubstep_minimix.ogg" type="audio/ogg">
						Update your browser. Your browser does not support HTML audio
					</audio>
					<audio controls="" id="userAudioFileAudioId" style="display:none;">
						<source src="" id="audioSourceId">
					</audio>
				</section>
			</div>
		</div>
		<div id="text_with_color_dots_preview_div_id" style="display:none;">
			<div class="content_card video_content title">
				<h3 class="slugVideoFeed" id="userTextWithColorDotsSlug">Top News</h3>
			</div>
			<div class="big_news_img" id="dummyTextWithColorDotsImage">
				<img src="../../../assets/images/modi_with_amit.jpg">
			</div>
			<div class="big_news_img" id="userTextWithColorDotsImage" style="display:none;">
				<img src="">
			</div>
			<div class="content_card">
				<h1 class="timeLineHeadingBigNewsFeed" id="userTextWithColorDotsTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>
				<p id="userTextWithColorDotsDescription" class="text_mono">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
			</div>
		</div>
		<div id="story_album_preview_div_id" style="display:none;">
			<div class="col-12">
				<div class="card singlefeed">
					<div class="card-body">
						<div class="content_card video_content title">
							<h3 class="slugPhotoFeed" id="StoryAlbumSlugId">World</h3>
						</div>
						<div class="slider-frame">
							<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
								<div class="" role="listbox" id="StoryAlbumMultipleImagesDivId">
									<div class="carousel-item active">
										<img class="d-block img-fluid" src="../../../assets/images/banner1.jpg" alt="First slide">
										<div class="slider_num_of">
											1/2
										</div>
										<h5 class="timeLineHeadingPhotoFeed">It has Survived not only five centuries, but also the leap into electronic typesetting.</h5>
									</div>
									<div class="carousel-item">
										<img class="d-block img-fluid" src="../../../assets/images/banner2.jpg" alt="Second slide">
										<div class="slider_num_of">
											2/2
										</div>
										<h5 class="timeLineHeadingPhotoFeed">It has Survived not only five centuries, but also the leap into electronic typesetting.</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="big_headlines_preview_div_id" style="display:none;">
			<div class="content_card">
				<h5 class="slugTitleBigNewsFeed" id="userBigHeadlinesSlug" style="text-transform:uppercase;">Just in</h5>
				<h1 class="timeLineHeadingBigNewsFeed" id="userBigHeadlinesTitle" style="font-weight:900;">THIS IS BIG:Air India Express aircraft from Dubai to Calicut With 191 passengers</h1>

				<p id="userBigHeadlinesPoints" style="padding:10px;" class="text_mono">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<div class="publish_time">
					<h5 style="margin-bottom:10px;">3 minutes ago</h5>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Preview Ends -->
<div class="col-md-6">
  <!-- Filter Starts -->
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title d-inline-flex">Timeline Filter</h4>
				<div class="row form-group">
					<div class="col-md-11">
						<div class="input-group dategroup d-inline-flex pr-3" id="dateFilterDivId">
							<input type="text" id="story_date" class="form-control datearea" name="runo_timeline_date" onchange="setSelectedDate()" placeholder="" required="" data-date-format="dd/mm/yyyy" data-provide="datepicker" data-date-autoclose="true" value="<?php echo date('d/m/Y') ?>">
							<div class="input-group-append">
								<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
							</div>
						</div>

					</div>
					<div class="col-md-1">
						<button class="btn d-inlin-flex btn-info float-right" type="button" onclick="getJustinList()" id="dateFilterSearchButtonId"><i class="fas fa-search"></i></button>

					</div>

				</div>

					<!--<a class="filter_icon" href="javascript:;"><i class="fa fa-filter" aria-hidden="true"></i></a>-->

				<!-- <a class="publish_btn btn btn-primary" href="javascript:;" onclick="resetDisplayOrder();" id="resetDisplayOrderHrefId" style="display:none;">Publish</a> -->


			</div>
		</div>
	</div>
	<!-- Filter Ends -->
	<!-- Timeline Preview Starts -->
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title pb-0">Timeline Preview</h4>
				<a class="publish_btn btn btn-primary" href="javascript:;" onclick="resetDisplayOrder();" id="resetDisplayOrderHrefId" style="display:none;">Publish</a>
				<div class="row">
					<div class="col-12 p-0">
						<div id="JustinList">


						</div>
					</div>
				</div>
		</div>
	</div>
	<!-- Timeline Preview Ends -->
</div>
</section>