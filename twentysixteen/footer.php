<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package storefront
*/

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action( 'storefront_before_footer' ); ?>

<footer id="footer">
	<div class="footer-holder">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">





					<div class="footer-logo">
						<?php
						$bgimg = ot_get_option( 'footer_links' );?>
						<?php //var_dump($bgimg);?>
						<!--  This Is Option Tree Supported Footewr Icon Show-->
						<?php echo  '<img src="' . $bgimg . '" alt="error">' ?>
						<!--  This Is Hard Coated Way of Showing Footer Icon-->
						<!-- <a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/footer-logo.png" alt="Tarzz"></a> -->
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
								<?php

								if(isset($_POST['save'])){
							       $wpdb->insert('wp_mail',
							           array(
							               'chord' => $_POST['chord']
							               ),
							           array(
							               '%s'
							               )
							           );
							   }




										/*if (!empty($_POST)) {
												global $wpdb;
												//$table = wp_achord;
												$wpdb->insert('wp_mail',
												$data = array(
														'chord'    => $_POST['chord']
												);
												$format = array(
														'%s'
												);
												$success=$wpdb->insert( $table, $data, $format );
												if($success){
														echo 'data has been save' ;
												}
										} else {
												?>*/?>
												<form method="post">
														<textarea name="chord"></textarea>
														<input type="submit">
												</form>
										<?php ?>










								<!--<div class="input-box">
									<input type="email" placeholder="Enter your email">
								</div>
								<div class="actions">
									<button class="button" type="submit">
										<span>
											<span>Subscribe</span>
										</span>
									</button>
								</div>-->
							</form>
							<h2>FOLLOW US</h2>
							<ul class="social">
								<!--  This Is Another Loop Testing for Ico  Array-->
								<!--  I Used Built-in Icons and copied them to array then accordingly in loop showd them with Option Tree-->
								<?php $social_media_channels = array(
									"LinkedIn" => "fa fa-linkedin",
									"Github" => "fa fa-github",
									"Reddit" => "fa fa-reddit",
									"Soundcloud" => "fa fa-soundcloud"
								);
								$social_media_icons = ot_get_option( 'social_links' );
								?>
								<?php if ( $social_media_icons ) { ?>
									<ul class="social-media-icons-sections">
										<?php
										foreach ( $social_media_icons as $key=>$icon ) {
											if ( $social_media_channels[$icon['name']] ) {
												echo "<li class='social-media-icon'><a target='_blank' href='" . $icon['href'] . "'><i class='" . $social_media_channels[$icon['name']] . "'></i></a></li>";
											}
										}
										?>
									</ul>
								<?php } ?>
								<!--  This Is is Hard Coated Way of showing Icons in Footer bar-->
								<!--<li><a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/github.png"></a></li>
								<li><a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/linkedin.png"></li>
								<li><a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/reddit.png"></li>
								<li><a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/soundcloud1.png"></li>-->
								<!--<li><span class="dashicons dashicons-facebook-alt"></span></li>
								<li><span class="dashicons dashicons-twitter"></span></li>
								<li><span class="dashicons dashicons-share-alt"></span></li>
								<li><span class="dashicons dashicons-googleplus"></span></li>-->
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
			<!--  This Is Copyright Text and URL Link Attached to it -->
			<?php
			$cpright = ot_get_option( 'copyright_text' );?>
			<?php echo  $cpright ?>
			<?php //var_dump($devweb);?>
			<!-- <p>ALL RIGHTS RESERVED | POWERED BY <a href="#">WEBWORKS</a></p> -->
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
