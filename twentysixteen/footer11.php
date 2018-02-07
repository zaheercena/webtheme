<footer id="footer">
		<div class="footer-holder">
				<div class="container">
						<div class="row">
								<div class="col-sm-3">
										<div class="footer-logo">
												<a href="#"><img src="<?php echo get_template_directory_uri();?> /img/footer-logo.png" alt="Tarzz"></a>
										</div>
								</div>
								<div class="col-sm-9">
										<div class="row">
												<div class="col-sm-3 col-xs-6">

														<ul class="footer-links">
													<?php wp_nav_menu(array('theme_location'=>'new-menu')); ?>
														</ul>
												</div>
												<div class="col-sm-3 col-xs-6">
														<ul class="footer-links">
																<?php wp_nav_menu(array('theme_location'=>'another-menu')); ?>
														</ul>
												</div>
												<div class="col-sm-3 col-xs-6">
														<ul class="footer-links">
																<?php wp_nav_menu(array('theme_location'=>'an-extra-menu')); ?>
														</ul>
												</div>
												<div class="col-sm-3 col-xs-6">
													 <h2>NEWSLETTER</h2>
													 <p>Be the first one to hear about our exclusive offers and latest arrivals</p>
													 <form action="#" id="newsletter-validate-detail" class="form-newsletter" method="post">
															 <div class="input-box">
																	 <input type="email" placeholder="Enter your email">
															 </div>
															 <div class="actions">
																	 <button class="button" type="submit">
																			 <span>
																					 <span>Subscribe</span>
																			 </span>
																	 </button>
															 </div>
													 </form>
													 <h2>FOLLOW US</h2>
													 <ul class="social">
																<li><a href="#"><i class="icon-facebook"></i></a></li>
																<li><a href="#"><i class="icon-twitter"></i></a></li>
																<li><a href="#"><i class="icon-instagram"></i></a></li>
																<li><a href="#"><i class="icon-youtube-play"></i></a></li>
														</ul>
												</div>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-xs-12">
										<div class="support">
												<img src="<?php echo get_template_directory_uri();?> /img/img22.png" alt="">
										</div>
								</div>
						</div>
				</div>
		</div>
		<div class="copyright text-center">
				<div class="container">
						<p>ALL RIGHTS RESERVED | POWERED BY <a href="#">WEBWORKS</a></p>
				</div>
		</div>
</footer>
</div>
</div>
</div><!-- .container -->
<?php wp_footer(); ?>
</body>
</html>
