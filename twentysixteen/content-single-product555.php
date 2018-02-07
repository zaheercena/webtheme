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
<section class="product-detail">
  <div class="row">
    <div class="col-md-9">
      <div class="product-img-box">
        <div class="cycle-gallery">
          <div class="pagination">
            <ul>
              <?php
                  global $product;

                  $attachment_ids = $product->get_gallery_attachment_ids();
                  //$attachment_feature = $product->get_featured_image_ids();

                  foreach( $attachment_ids as $attachment_id ) {

                      //echo $image = wp_get_attachment_image($attachment_id);
                      echo $image = wp_get_attachment_image($attachment_id);
                      //echo $image_link = wp_get_attachment_url( $attachment_id );
                  }
                  echo the_post_thumbnail('full');
              ?>



                <?php //do_action( 'woocommerce_before_single_product_summary' );?>
              <?php //do_action( 'woocommerce_product_thumbnails' );?>
            </ul>
          </div>
          <div class="mask-holder">
            <div class="mask">
              <div class="slideset">
                <div class="slide">
                  <?php
                  /**
                  * woocommerce_before_single_product hook.
                  *
                  * @hooked wc_print_notices - 10
                  */

                  //do_action( 'woocommerce_before_single_product_summary' );
                //  do_action( 'woocommerce_before_single_product_summary' );
                //  do_action( 'woocommerce_show_product_thumbnails' );
                  echo the_post_thumbnail('full');?>
                </div>
              </div>
              <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php
                /**
                * woocommerce_before_single_product_summary hook.
                *
                * @hooked woocommerce_show_product_sale_flash - 10
                * @hooked woocommerce_show_product_images - 20
                */
                //do_action( 'woocommerce_before_single_product_summary' );
                ?>
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
          <div class="summary entry-summary">

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
            ?>

          </div><!-- .summary -->
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php
  /**
  * woocommerce_after_single_product_summary hook.
  *
  * @hooked woocommerce_output_product_data_tabs - 10
  * @hooked woocommerce_upsell_display - 15
  * @hooked woocommerce_output_related_products - 20
  */
  do_action( 'woocommerce_after_single_product_summary' );
  ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>
