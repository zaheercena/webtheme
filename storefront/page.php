<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* @package storefront
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if(!is_cart() || !is_checkout()); { ?>
		<?phpthe_post_thumbnail();?>
		<div class="row">
			<div class="col-md-12">
				<?php $taxas = get_taxonomies($args);?>
				<div id = "myCarousel" class="carousel slide" data-ride="carousel">


					<?php	//Here is Slider		?>
					<div class="slider">
						<div class="slides">
							<ul class="items">
								<?php
								$new_query = new WP_Query('post_type=slide&posts_per_page=-1');
								while($new_query-> have_posts()) : $new_query->the_post();
								?>
								<div class="item_active">
									<img src="<?php the_field("slide_image");?>" alt="<?php 'the_title();'?>">
									<div class="carouse-caption hidden-phone">
										<h4><?php 'the_title();'?></h4>
										<p><?php 'the_field("slide_caption");'?></p>
									</div>
								</div>
							<?php endwhile; ?>
							<?phpwp_reset_query();?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>



				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo get_template_directory_uri();?> /img/img4.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>

					<div class="item">
						<img src="<?php echo get_template_directory_uri();?> /img/img5.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>

					<div class="item">
						<img src="<?php echo get_template_directory_uri();?> /img/img6.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>

					<div class="item">
						<img src="<?php echo get_template_directory_uri();?> /img/img7.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>

					<div class="item">
						<img src="<?php echo get_template_directory_uri();?> /img/img6.jpg" alt="">
						<div class="carousel-caption">
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>




	<?php//Here I am Ending Categories?>


	<?php $categories = get_categories($args);?>
	<ul class="product-list">
		<li>
			<a href="#" class="product-image">

				<img src="<?php echo get_template_directory_uri();?> /img/img8.jpg" alt="">
				<span class="img">
					<img src="<?php echo get_template_directory_uri();?> /img/img9.jpg" alt="">
				</span>
				<span class="title" href="localhost/kag/category/unstitched.php">New arrivals</span>
			</a>
		</li>
		<li>
			<a href="#" class="product-image">

				<img src="<?php echo get_template_directory_uri();?> /img/img9.jpg" alt="">
				<span class="img">
					<img  src="<?php echo get_template_directory_uri();?> /img/img10.jpg" alt="">
				</span>
				<span class="title" href="localhost/kag/category/unstitched.php" target="_blank">unstitched></span>
			</a>
		</li>
		<li>
			<a href="#" class="product-image">

				<img src="<?php echo get_template_directory_uri();?> /img/img10.jpg" alt="">
				<span class="img">
					<img src="<?php echo get_template_directory_uri();?> /img/img8.jpg" alt="">
				</span>
				<span class="title" href="localhost/kag/category/unstitched.php" target="_blank">pret</span>
			</a>
		</li>
	</ul>

	<?php//Here I am Ending Categories?>





	<?php while ( have_posts() ) : the_post();
	the_post_thumbnail();
	do_action( 'storefront_page_before' );

	get_template_part( 'content', 'page' );

	/**
	* Functions hooked in to storefront_page_after action
	*
	* @hooked storefront_display_comments - 10
	*/
	do_action( 'storefront_page_after' );

endwhile; // End of the loop. ?>
<?php } ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
//This is for all Sidebar
//do_action( 'storefront_sidebar' );
get_footer();
