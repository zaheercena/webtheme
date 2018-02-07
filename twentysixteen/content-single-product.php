<?php
/**
* The template for displaying product content in the single-product.php template
*
* This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
*
* HOWEVER, on occasion WooCommerce will need to update template files and you
* (the theme developer) will need to copy the new files to your theme to
* maintain compatibility. We try to do this as little as possible, but it does
* happen. When this occurs the version of the template file will be bumped and
* the readme will list any important changes.
*
* @see 	    https://docs.woocommerce.com/document/template-structure/
* @author 		WooThemes
* @package 	WooCommerce/Templates
* @version     3.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="main-container">
	<main class="main" role="main">
		<div class="std">
			<div class="container">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class="breadcrumbs">
							<!--This is where user can locate Page -->
						</div>
					</div>
				</div>
				<section class="product-detail">
					<div class="row">
						<div class="col-md-9">
							<div class="product-img-box">
								<div class="cycle-gallery">
									<div class="pagination">
										<ul>
											<?php
											//$product = wc_get_product($post->ID);
											//$items = $product->get_items();
											//$counter = sizeof($items);
											//while( $counter>0):
											//echo $product->get_image();

											echo get_the_post_thumbnail( $post->ID, $image_size );

										//	$counter--;
										//endwhile;


										global $product;

										    $attachment_ids = $product->get_gallery_attachment_ids();

										    foreach( $attachment_ids as $attachment_id ) {
										        echo $image_link = wp_get_attachment_image( $attachment_id, 'full');
										    }
											?>



											<?php //do_action( 'woocommerce_product_thumbnails' );?>
										</ul>
									</div>
									<div class="mask-holder">
										<div class="mask">
											<div class="slideset">
												<?php
												//$product = wc_get_product($post->ID);
												//$counter = strlen($product);
												//while( $counter > 0 ) :
												//echo $product->get_image();
												//$counter--;
												//endwhile;
												?>
												<?php do_action( 'woocommerce_before_single_product_summary' );
												//$image_array = woocommerce_show_product_images();

												//foreach($image_array as $img ){
													//echo $image_array;
												//}
													//echo woocommerce_show_product_images();?>
												<?php ///do_action( 'woocommerce_show_product_images' );?>
												<?php ///do_action( 'woocommerce_product_thumbnails' );?>
											</div>
											<a href="#" class="btn-prev"><i class="icon-left-open-big"></i></a>
											<a href="#" class="btn-next"><i class="icon-right-open-big"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<form action="#" id="product_addtocart_form">
								<div class="product-shop">
									<?php
									/**
									* woocommerce_single_product_summary hook.
									*
									* @hooked woocommerce_template_single_title - 5
									* @hooked woocommerce_template_single_rating - 10
									* @hooked woocommerce_template_single_price - 10
									* @hooked woocommerce_template_single_excerpt - 20
									* @hooked woocommerce_template_single_add_to_cart - 30
									* @hooked woocommerce_template_single_meta - 40
									* @hooked woocommerce_template_single_sharing - 50
									* @hooked WC_Structured_Data::generate_product_data() - 60
									*/
										do_action( 'woocommerce_single_product_summary' );
										//do_action( 'woocommerce_single_variation');
										do_action( 'woocommerce_after_variations_form');
										do_action( 'woocommerce_product_meta_start');
										do_action('woocommerce_after_single_product_summary');
									?>
								</div>
							</form>
						</div>
					</div>
				</section>

				<section class="also-like-products">
					<header class="header">
						<h1></h1>
					</header>
					<?php ?>
				</section>
			</div>
		</div>
	</main>
</div>
<?php //do_action( 'woocommerce_upsell_display' ); ?>
<?php do_action( 'woocommerce_after_single_product' ); ?>
