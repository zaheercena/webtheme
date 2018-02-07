<?php
/**
* The header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package storefront
*/

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<script>
	jQuery(document).ready(function($){
		$('#slides').slides({
			preload: true,
			preloadImage: '<?php echo get_template_directory_uri(); ?>/img/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true,
			generatePagination: false

		});
	});
</script>



</head>
<?php

	if( is_front_page() ):
		$awesome_classes = array( 'awesome-class', 'my-class' );
	else:
		$awesome_classes = array( 'no-awesome-class' );
	endif;
?>
<div class="wrapper">
		<div class="page">
				<header id="header">
						<div class="header-holder container-fluid">
								<div class="row">
										<div class="col-xs-3"></div>
										<div class="col-xs-6">
												<h1 class="logo">
													<?php the_custom_logo();?>
														<!-- <a href="#"><img src="<?php //echo get_template_directory_uri();?> /img/logo.png" alt="Tarzz"></a> -->
												</h1>
										</div>
										<div class="col-xs-3">
												<ul class="header-icon-list">
													<li>
															<div class="add-class-holder">
															<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

																$count = WC()->cart->cart_contents_count;
																?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
																if ( $count > 0 ) {
																	?>
																	<a class="dashicons dashicons-cart"href="http://localhost/kag/tarz/cart/"></a>
																	<a class="cart-contents-count"><?php //echo esc_html( $count ); ?></a>
																	<?php
																}?></a>
															<?php } ?>
														</div>
													</form>
												</li>
												<li><!--<a href="#"><i class="icon-bag1"></i></a></li>-->

												<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
													<label>
														<span class="screen-reader-text">Search for:</span>
														<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
													</label>
													<span type="submit" class="dashicons dashicons-search" value="Search"> </span>
												</ul>
												</form>
											</ul>
										</div>
									</div>
								</div>

<div class="container">

	<div class="row">

		<div class="col-xs-10">
			<!--<nav class="navbar navbar-default">-->
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<?php //do_action( 'storefront_header' ); ?>
						<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
							<!--<li><span class="sr-only">Toggle navigation</span></li>-->
							<!--<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>-->
						</button>
						<a class="navbar-brand" href="#"></a>
					</div>
					<h3><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-center'
								//'walker' => new Walker_Nav_Primary()
								)
							);
						?>
					</div></h3>
				</div><!-- /.container-fluid -->
			<!--</nav>-->

		</div>

	</div>

	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
