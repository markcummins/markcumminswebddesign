<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="msapplication-tap-highlight" content="no"/> 
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="Mark Cummins Web Design" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo base_url(); ?>" />
	<meta property="og:image" content="<?php echo base_url('assets/img/meta-logo.png'); ?>" />
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css_fe/normalize.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css_fe/bootstrap.min.css');?>">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	<!-- parallax -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css_fe/style.css');?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css_fe/examples.css');?>" type="text/css">

	<link rel="stylesheet" href="<?php echo base_url('assets/css_fe/main.css');?>">
	<script src="<?php echo base_url('assets/js_fe/vendor/modernizr-2.6.2-respond-1.1.0.min.js');?>"></script>

	<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
<![endif]-->
</head>
<body>
	<?php $appID = (ENVIRONMENT === 'production' ? '1391582671155159' : '324879511056391'); ?>
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : <?php echo $appID;?>,
				xfbml      : true,
				version    : 'v2.2'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->        
	<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#top">Mark Cummins</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#cv">C.V</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<!--
<ul class="nav navbar-nav navbar-right">
<li><a href="#">Link</a></li>
</ul>
-->
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<div id="content-wrapper">
		<div id="example-wrapper">
			<div id="top" class="scrollContent">

				<section class="demo">

					<div class="responsive-circle">
						<?php echo file_get_contents(base_url('assets/svg/head.svg')); ?>
					</div>


					<div id="parallax1">
						<div style="background-image: url(assets/img/home-office-b.jpg); background-size: cover;">                                
						</div>
					</div>

					<div>
						<div class="svg-container">

							<br/>
							<br/>
							<div class="col-sm-12">
								<svg id="svg_hr" width="100%" viewBox="0 0 1000 65"></svg>
							</div>
							<section id="ABOUT">
								<div class="container">
									<!-- Example row of columns -->
									<div class="row">	
										<div class="clearfix"></div>
										<div class="col-sm-6 col-lg-4">
											<h1 style="margin-top: 0px;">
												<i style="color:#de9100" class=" fa fa-rocket"></i> 
												<span style="color:#2182f2;">Hello
													<span style="color:#cc0e48; margin-left:-20px;">,</span>
													</h1>
												<h2>My Name is Mark Cummins,</h2>
												<br/>
												<h2 style="display:inline;"> 
												<a href="ie.linkedin.com/in/markcumminswebdeveloper" target="_blank">
													Linked <i style="border-right:0px;" class="fa fa-linkedin-square"></i>
													</a>
												</h2>
												
												</div>
											<div class="col-sm-6 col-lg-8 left-border">
												<h2>About,</h2>
												<p>I'm a <span class="lead">web developer/designer. </span> 
													I create 
													<span class="lead">Web Applications, Websites &amp; CMS systems.</span> 
													I am currently based in Limerick 
													and build cool 
													<span class="lead">responsive websites</span> like this one.</p>
													
												<p>
													I worked with
													<span class="lead"><a href="http://bluechiefsolutions.com/"> BlueChief Social
														<i class=" fa fa-facebook"></i> 
														<i class=" fa fa-twitter"></i> 
														<i class=" fa fa-google-plus"></i> 
														</a>
													</span>
													for the last year and a half as a 
													<span class="lead">PHP developer </span>
													helping them build all of the above. 
													I am currently based in Limerick 
													and build cool responsive websites like this one.</p>

												<p>I <span class="lead">graduated</span> from UL in 2013 
													(Grad Dip in Computing <sup>LEVEL 9</sup>)
													with <span class="lead">first class honors</span>, worked
													with the <span class="lead">LRC</span> (Localization Research Center) 
													for a few months as a 
													<span class="lead">PHP developer </span>
													before joining
													BlueChief in November 2013</p>
												<p> Please feel free to 
													<span class="lead"><a href="#contact">leave some feedback</a></span>
													at the bottom 
													of this page or get in contact with me directly.
												</p>
											</div>
											<svg id="svg_hr_about" width="100%" viewBox="0 0 1000 4"></svg>
										</div>
									</div>

									</section>

								<!-- Portfolio Grid Section -->
								<section id="portfolio" class="portfolio">
									<div class="container">
										<div class="row">
											<div class="col-lg-12 text-center">
												<h2 class="section-heading">Portfolio</h2>
												<h3 class="section-subheading text-muted">Web Development Portfolio.</h3><br/>
											</div>
										</div>
										<div class="row">
											<br/>
											<div class="col-md-4 col-sm-6 portfolio-item">
												<a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
													<div class="portfolio-hover">
														<div class="portfolio-hover-content">
															<span class="fa-stack fa-lg">
																<i class="fa fa-circle fa-stack-2x"></i>
																<i class="fa fa-plus fa-stack-1x"></i>
															</span>
														</div>
													</div>
													<img src="assets/img/portfolio/logo-studentsunion.png" class="img-responsive" alt="">
												</a>
												<div class="portfolio-caption">
													<h4>UL Students Union</h4>
													<small><p class="text-muted">CMS Web Application</p>
														</div>
												</div>
												<div class="col-md-4 col-sm-6 portfolio-item">
													<a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/treehouse.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>BlueChief Portal</h4>
														<p class="text-muted">Project Management Application</p>
													</div>
												</div>
												<div class="col-md-4 col-sm-6 portfolio-item">
													<a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/roundicons.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>RosterChief</h4>
														<p class="text-muted">Rostering Web Application</p>
													</div>
												</div>									
												<div class="col-md-4 col-sm-6 portfolio-item">
													<a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/trommons.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>Trommons</h4>
														<p class="text-muted">Translation Web Application</p>
													</div>
												</div>
												<div class="col-md-4 col-sm-6 portfolio-item">
													<a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/startup-framework.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>John Sweeney Fitness</h4>
														<p class="text-muted">CMS Website</p>
													</div>
												</div>
												<div class="col-md-4 col-sm-6 portfolio-item">
													<a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/il.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>Innovate Limerick</h4>
														<p class="text-muted">CMS Website</p>
													</div>
												</div>
											</div>
											<br/>
											<svg id="svg_hr_footer" width="100%" viewBox="0 0 1000 4"></svg>
										</div>

										</section>



									<!-- Portfolio Grid Section -->
									<section id="js-fiddle" class="portfolio">
										<div class="container">
											<div class="row">
												<div class="col-lg-12 text-center">
													<h2 class="section-heading">Labs</h2>
													<h3 class="section-subheading text-muted">Cool Experiments.</h3><br/>
												</div>
											</div>
											<div class="row">
												<br/>
												<div class="col-md-6 col-sm-6 portfolio-item">
													<a href="<?php echo base_url('/gambletron');?>" class="portfolio-link" >
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/gt.png" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>GambleTron</h4>
														<small><p class="text-muted">Football Results Calculator</p>
														</div>
												</div>
												<div class="col-md-6 col-sm-6 portfolio-item">
													<a href="http://jsfiddle.net/markovski/mcVa9/" target="_blank" class="portfolio-link" >
														<div class="portfolio-hover">
															<div class="portfolio-hover-content">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-plus fa-stack-1x"></i>
																</span>
															</div>
														</div>
														<img src="assets/img/portfolio/clock.jpg" class="img-responsive" alt="">
													</a>
													<div class="portfolio-caption">
														<h4>JS Canvas Clock</h4>
														<small><p class="text-muted">HTML5 Canvas Stopwatch</p>
														</div>
												</div>

												</div>
												<br/>
											</div>

											</section>

										<div style="position:relative;">							
											<div id="page-down-arrow"><div id="down-arrow-icon"></div></div>		
											<div id="parallax2">
												<div style="background-image: url(assets/img/paper.jpg); background-size: cover;">                                
												</div>
											</div>
										</div>

										<section id="cv">
											<div class="container">
												<!-- Example row of columns -->
												<div class="row">	
													<div class="col-lg-12 text-center">
														<h2 class="section-heading">Experience</h2>
														<h3 class="section-subheading text-muted">Web Development Experience.</h3><br/>
													</div>
													<div class="clearfix"></div>

													<div class="col-md-4 col-sm-6">
														<div style="display:none;" class="anim-a">
														<h2><i class="fa fa-code"></i> Programming Languages</h2>
														<div class="hr"></div>
														<p>Languages - PHP, Java, Python, ASP.Net, VB VB.Net, Visual Basic<br/>
															Fremeworks - Codeigniter, Slim<br/>
															Database -  SQL(mySQL msSQL)  <br/>
															SCM (Version Control) - Git, SVN
														</p>
														</div>
													</div>
													<div class="col-md-4 hidden-sm hidden-xs">
														<canvas id="doughnutChart"></canvas>
													</div>
													<div class="col-md-4 col-sm-6 text-center">
														<div style="display:none;" class="anim-a">
														<?php
echo file_get_contents(base_url('assets/svg/pl_a.svg'));
														?>
														</div>
													</div>
													<div class="clearfix"></div><br/><br/><br/>

													<div class="col-sm-12">
														<svg id="svg_hr_b" width="100%" viewBox="0 0 1000 20"></svg>
													</div>

													<div class="col-md-4 col-sm-6 col-sm-push-8">
														<div style="display:none;" class="anim-b">
														<h2><i class="fa fa-code"></i> Programming Languages</h2>
														<div class="hr"></div>
														<p> More Languages - Javascript (JQuery, JQuery UI &amp; Mobile, AJAX) <br/>
															The Basics - HTML, XML, CSS (LESS, SCSS)<br/>
															FrontEnd Frameworks - BootStrap, Zurb Foundation<br/>
															Task Runners - Bower, Gulp<br/>
															Social API's - Google, LinkedIn, FaceBook &amp; Twitter<br/>
															CMS - WordPress

														</p>
														</div>
													</div>  
													<div class="col-md-4 hidden-sm hidden-xs">
														<br/><br/>
														<canvas id="doughnutChart-b"></canvas>
													</div>
													<div class="col-md-4 col-sm-6 col-sm-pull-8 text-center">
														<div style="display:none;" class="anim-b">
														<?php
echo file_get_contents(base_url('assets/svg/pl_b.svg'));
														?>
														</div>
													</div>

													<div class="clearfix"></div><br/>	
													<div class="col-sm-12">
														<svg id="svg_hr_c" width="100%" viewBox="0 0 1000 20"></svg>
													</div>

													<div class="col-md-4 col-sm-6">
														<div style="display:none;" class="anim-c">
														<h2><i class="fa fa-laptop"></i>  
															Operating Systems
														</h2>
														<div class="hr"></div>
														<p>MS-Windows (XP, Vista, 7, 8)<br/> 
															Linux (Ubuntu, Fedora, Mint, Raspbian, ElementaryOS)<br/>
															Mac OS
														</p>
														</div>
													</div>
													<div class="col-md-4 hidden-sm hidden-xs">
														<canvas id="doughnutChart-c"></canvas>
													</div>
													<div class="col-md-4 col-sm-6 text-center">
														<div style="display:none;" class="anim-c">
														<?php
echo file_get_contents(base_url('assets/svg/os.svg'));
														?>
														</div>
													</div>
													<div class="clearfix"></div><br/><br/>
												</div>
											</div>
										</section>
										</div>
									</div>						


								<div style="position:relative;">							
									<div id="page-down-arrow"><div id="down-arrow-icon"></div></div>		
									<div id="parallax3">
										<div style="background-image: url(assets/img/typewriter.jpg); background-size: cover;">                                
										</div>
									</div>
								</div>

								<section id="contact" class="bg-light-gray">
									<div class="container">
										<div class="row">
											<div class="col-lg-12 text-center">
												<h2 class="section-heading">Contact</h2><br/>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-5">
												<h3 class="section-subheading text-muted text-center">
													<i class="fa fa-user-secret"></i> Send me a message
												</h3><br/>

												<form name="contact-form" id="contact-form" method="post" action="mail.php">
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class=" fa fa-user"></i></span>
															<input class="form-control" name="subject" placeholder="subject..." type="text">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
															<textarea class="form-control" name="message" placeholder="message" rows="3"></textarea>
														</div>
													</div>
													<p>Are you a bot?
														<span id="mail-num-a"><?php echo(rand(10,50)); ?></span> + 
														<span id="mail-num-b"><?php echo(rand(10,50)); ?></span>
													</p>

													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-android"></i></span>
															<input class="form-control" id="mail-ans" placeholder="answer..." type="text">
														</div>
													</div>

													<span id="mail-response"></span>
													<button id="send-mail" class="btn btn-primary pull-right" type="button"><i class="fa fa-send"></i> Send</button>
												</form>

											</div>
											<div class="col-sm-2 text-center split-border">
												<div class="col-sm-6 right-border hidden-xs"></div>
												<div class="clearfix"></div>
												<div class="col-sm-12"></div>
												<h2>OR</h2>
												<div class="clearfix"></div>
												<div class="col-sm-6 right-border hidden-xs"></div>
											</div>
											<div class="col-sm-5">
												<h3 class="section-subheading text-muted text-center">
													<i class="fa fa-thumbs-o-up"></i> Say something nice
												</h3><br/>
												<div class="fb-comments" data-width="100%" data-href="http://localhost/tests/svg_test" data-numposts="6" data-colorscheme="light"></div>
											</div>

										</div>

										<br/><br/><br/><br/>
									</div>
								</section>

								<section>
									<div class="clearfix"></div>
									<br/><br/>
									<div id="map-canvas"></div>
								</section>



							</section><!--DEMO SECTION-->

							<div class="spacer s_viewport"></div>
						</div>
					</div>
					</div>
				<!--		</div>-->

				<div class="footer">
					<div class="container-fluid">
						<div class="row">	
							<div class="col-sm-6"><br/>
								<p><i class="fa fa-copyright"> </i> Web Design | Mark Cummins 2015 | <a href="http://bluechiefsolutions.com/">BlueChief Social</a></p>						
							</div>
							<div class="col-sm-6"><br/>
								<ul class="share-buttons">
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.markcumminswebdesign.com%2F&t=Mark%20Cummins%20Web%20Design" target="_blank"><img src="assets/img/color/Facebook.png"></a></li>
									<li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fwww.markcumminswebdesign.com%2F&text=Mark%20Cummins%20Web%20Design:%20http%3A%2F%2Fwww.markcumminswebdesign.com%2F&via=MarkCummins4" target="_blank" title="Tweet"><img src="assets/img/color/Twitter.png"></a></li>
									<li><a href="https://plus.google.com/share?url=http%3A%2F%2Fwww.markcumminswebdesign.com%2F" target="_blank" title="Share on Google+"><img src="assets/img/color/Google+.png"></a></li>
									<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.markcumminswebdesign.com%2F&title=Mark%20Cummins%20Web%20Design&summary=Design%20%7C%20Create%20%7C%20Repeat&source=http%3A%2F%2Fwww.markcumminswebdesign.com%2F" target="_blank" title="Share on LinkedIn"><img src="assets/img/color/LinkedIn.png"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<footer>

					<script type="text/javascript"
							src="<?php echo base_url('assets/js_fe/maps.js?key=AIzaSyAjMTyZ7wKxUBJAsxuO9silbzU5g0JB7uo');?>">
					</script>
					
<?php if(ENVIRONMENT === 'production'): ?>
	<script src="<?php echo base_url('assets/dist/frontend.min.js');?>"></script>
<?php else: ?>
	<script src="<?php echo base_url('assets/dist/frontend.js');?>"></script>
<?php endif; ?>

					

					<!-- Google Analytics -->
					<script>
						(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
							(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
												})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

						ga('create', 'UA-54554861-2', 'auto');
						ga('send', 'pageview');
					</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54ea4b4d55da3be8" async="async"></script>

					<!-- End Google Analytics -->

				</footer>
				</body>
				</html>